# Sapphire2.0 project architecture

Sapphire 2.0 was projected using GSPA - Gem Stack PHP Architecture

## Concepts

It is used to develop large frameworks that consist of many liblaries or sub-frameworks of our creation.

We use modules - each liblary or sub-framework is being developed as Module, they are like node.js packages etc.
All modules are combined in modules/Combined/CombinedSapphire2Module that contains all essential things.

Our Combined module is injected into the main *index.php* file where we instanciate or initialize main module.

### Main module

Main module is module that contains our framework that uses other modules.

### Helpers module

Helpers module contains other helpful utilities like: file system, xml/json formats, strings etc

## Dev source code

