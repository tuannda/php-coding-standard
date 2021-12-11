# PHP Coding Standard
## Requirements

[PHP_CodeSniffer 3](https://github.com/squizlabs/PHP_CodeSniffer). (3.6 or greater).

### Global install (Recommended)

Globally [install PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer/blob/master/README.md) with one of the various methods. (Skip this step if you already have it installed.)

Once complete you should be able to execute `phpcs -i` on the command line.

You should see something like:-

`The installed coding standards are MySource, PEAR, PSR1, PSR2, Squiz and Zend.`

(Recommended) use composer...

`composer global require tuannda/php-coding-standard`

or clone this repository...

`git clone -b master --depth 1 https://github.com/tuannda/php-coding-standard.git`.

or download.

Take note of the paths where they were installed.

(Recommended) Create a symbolic link to the 'php-coding-standard/CodingStandard' directory in 'php_codesniffer/src/Standards/' eg. 

`ln -s ~/Documents/Projects/php-coding-standard/CodingStandard ~/.composer/vendor/squizlabs/php_codesniffer/src/Standards/CodingStandard`

or copy the `CodingStandard` directory to `php_codesniffer/src/Standards/`

Executing `phpcs -i` should now show CodingStandard installed eg.

`The installed coding standards are CodingStandard, MySource, PEAR, PSR1, PSR2, Squiz and Zend.`

You should now be able to set 'CodingStandard' as the phpcs standard in the plugin/editor/IDE of your choice.

### Composer install for a single project

`cd /Path/To/MyProject`  

`composer require tuannda/php-coding-standard`  

Set the 'phpcs standard path' and 'phpcbf standard path' in your editor/plugin config to:

'/Path/To/MyProject/vendor/php-coding-standard/CodingStandard/ruleset.xml'

### Command line use

#### Sniffing errors & warnings (reporting).

Single file...

`phpcs /Path/To/MyFile.php --standard='/Path/To/php-coding-standard/CodingStandard/ruleset.xml'`

or if globally installed.

`phpcs /Path/To/MyFile.php --standard=CodingStandard`

Directory (recursive).

`phpcs /Path/To/MyProject --standard='/Path/To/php-coding-standard/CodingStandard/ruleset.xml'`

or if globally installed.

`phpcs /Path/To/MyProject --standard=CodingStandard`

#### Fixing fixable errors.

Single file.

`phpcbf /Path/To/MyFile.php --standard='/Path/To/php-coding-standard/CodingStandard/ruleset.xml'`

or if globally installed.

`phpcbf /Path/To/MyFile.php --standard=CodingStandard`

Directory (recursive).

`phpcbf /Path/To/MyProject --standard='/Path/To/php-coding-standard/CodingStandard/ruleset.xml'`

or if globally installed.

`phpcbf /Path/To/MyProject --standard=CodingStandard`

### Run on Gitlab-CI

```
stylelint:
stage: stylelint
tags:
- gitlab-runner
only:
- merge_requests
script:
- phpcs --config-set default_standard /Path/To/php-coding-standard/CodingStandard/
- echo CI_COMMIT_SHA=${CI_COMMIT_SHA}
- echo CI_MERGE_REQUEST_TARGET_BRANCH_NAME=${CI_MERGE_REQUEST_TARGET_BRANCH_NAME}
- git fetch origin ${CI_MERGE_REQUEST_TARGET_BRANCH_NAME}
- FILES=$(git diff --name-only ${CI_COMMIT_SHA} origin/${CI_MERGE_REQUEST_TARGET_BRANCH_NAME} | grep '\.php'$)
- if [ ! -z "$FILES" ]; then echo $FILES | xargs phpcs; fi
when: always 
```

### Change crlf to lf on windows

```
git config --global core.autocrlf false
git config --global core.safecrlf false
```
