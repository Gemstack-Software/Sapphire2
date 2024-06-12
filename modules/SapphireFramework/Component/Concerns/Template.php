<?php
    namespace Sapphire\Component\Concerns;
    use Sapphire\Exceptions\UsedStylesMethodInNonAcidViewException;
    use Helpers\Files\File;
    use Helpers\Formats\JSON;
    use Helpers\Support\Str;
    use Acid\Compiler;
    use stdClass;

    trait Template 
    {
        public function Template(string $name)
        {
            $file = new File($this->thisComponentDirectoryPath . '/' . $name);

            /**
             * Checking if file is .acid or .php - if it's .acid then compile it
             */
            $extension = $file->Extension();

            if ($extension === 'acid')
            {
                $file = Compiler::Build ($file, styles: ["aquas" => $this->aquasStyles, "csses" => $this->cssesStyles]);
            } 

            /**
             * Check if developer used non .acid file with styles method
             */
            else 
            {
                if($this->usedStyles) 
                {
                    throw new UsedStylesMethodInNonAcidViewException("Detected usage of `public \Sapphire\Component->Styles()` method in component that does not uses `.acid` component template, while rendering file $name");
                }
            }

            /**
             * Rendering component with or without template
             */
            $this->StartTemplate();
                $file->Includes([
                    'component' => $this
                ]);
            $this->MetaTemplate();
            $this->EndTemplate(); 
        }

        public function StartTemplate(): void
        {
            $path = $this->RenovatePath($this->path);

            /**
             * Disable template if it's api component
             */
            $disableTemplate = $this->HasDisabledTemplateLayout();

            /**
             * Echoes template start
             */
            if(!$disableTemplate) 
            {
                echo "<sc-template-root hash=\"$this->hash\" unique=\"$this->unique\" path=\"$path\">";
            }
        }

        public function EndTemplate(): void
        {
            /**
             * Disable template if it's api component
             */
            $disableTemplate = $this->HasDisabledTemplateLayout();

            /**
             * Echoes template ending
             */
            if(!$disableTemplate) 
            {
                echo "</sc-template-root>";
            } 
        }

        public function MetaTemplate(): void
        {
            /**
             * Disable template if it's api component
             */
            $disableTemplate = $this->HasDisabledTemplateLayout();

            /**
             * Echoes template meta
             */
            if(!$disableTemplate) 
            {
                echo '<script type="sapphire-component/meta" sapphire-mid="' . $this->unique . '">' . JSON::ValueToString($this->DropStore() ). '</script>';
            } 
        }

        /**
         * Exlude BASE_DIR from path
         */
        public function RenovatePath(string $path): string 
        {
            $str = new Str($path);

            return $str->Split(BASE_DIR)[1];
        }

        public function HasDisabledTemplateLayout(): bool
        {
            if (!@$this->Store('params'))
            {
                return false;
            }

            if ($this->Store('params') instanceof stdClass)
            {
                return @ $this->Store('params')->{"__withoutTemplate"} != null;
            }
            else
            {
                return @ $this->Store('params')["__withoutTemplate"] != null;
            }

            return false;
        }
    }