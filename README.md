# Getting Started
## How to Build


The generated code has dependencies over external libraries like UniRest. These dependencies are defined in the ```composer.json``` file that comes with the SDK. 
To resolve these dependencies, we use the Composer package manager which requires PHP greater than 5.3.2 installed in your system. 
Visit https://getcomposer.org/download/ to download the installer file for Composer and run it in your system. 
Open command prompt and type ```composer --version```. This should display the current version of the Composer installed if the installation was successful.

* Using command line, navigate to the directory containing the generated files (including ```composer.json```) for the SDK. 
Run the command ```composer install```. This should install all the required dependencies and create the ```vendor``` directory in your project directory.

	![Building SDK - Step 1](http://apidocs.io/illustration/php?step=installDependencies&workspaceFolder=DigitalNewzealand-PHP)

* **[For Windows Users Only] Configuring CURL Certificate Path in php.ini**

	CURL used to include a list of accepted CAs, but no longer bundles ANY CA certs. So by default it will reject all SSL certificates as unverifiable. You will have to get your CA's cert and point curl at it. The steps are as follows:

	1. Download the certificate bundle (.pem file) from https://curl.haxx.se/docs/caextract.html on to your system

	2. Add curl.cainfo = "PATH_TO/cacert.pem" to your php.ini file located in your php installation. “PATH_TO” must be an absolute path containing the .pem file.

	> [curl]
	>
	> ; A default value for the CURLOPT_CAINFO option. This is required to be an
	>
	> ; absolute path.
	>
	> ; curl.cainfo=
	>

## How to Use

The following section explains how to use the DigitalNewzealand library in a new project.

#### 1. Open Project in an IDE
Open an IDE for PHP like PhpStorm. The basic workflow presented here is also applicable if you prefer using a different editor or IDE.

![Open project in PHPStorm - Step 1](http://apidocs.io/illustration/php?step=openIDE&workspaceFolder=DigitalNewzealand-PHP)

Click on ```Open``` in PhpStorm to browse to your generated SDK directory and then click ```OK```.

![Open project in PHPStorm - Step 2](http://apidocs.io/illustration/php?step=openProject0&workspaceFolder=DigitalNewzealand-PHP)     


#### 2. Add a new Test Project
Create a new directory by right clicking on the solution name as shown below:

![Add a new project in PHPStorm - Step 1](http://apidocs.io/illustration/php?step=createDirectory&workspaceFolder=DigitalNewzealand-PHP)

Name the directory as "test"

![Add a new project in PHPStorm - Step 2](http://apidocs.io/illustration/php?step=nameDirectory&workspaceFolder=DigitalNewzealand-PHP)
   
Add a PHP file to this project

![Add a new project in PHPStorm - Step 3](http://apidocs.io/illustration/php?step=createFile&workspaceFolder=DigitalNewzealand-PHP)

Name it "testSDK"

![Add a new project in PHPStorm - Step 4](http://apidocs.io/illustration/php?step=nameFile&workspaceFolder=DigitalNewzealand-PHP)

Depending on your project setup, you might need to include composer's autoloader in your PHP code to enable auto loading of classes.
   ```PHP
   require_once "../vendor/autoload.php";
   ```
It is important that the path inside require_once correctly points to the file ```autoload.php``` inside the vendor directory created during dependency installations.

![Add a new project in PHPStorm - Step 4](http://apidocs.io/illustration/php?step=projectFiles&workspaceFolder=DigitalNewzealand-PHP)

After this you can add code to initialize the client library and acquire the instance of a Controller class. Sample code to initialize the client library and using controller methods is given in the subsequent sections.


#### 3. Run the Test Project
To run your project you must set the Interpreter for your project. Interpreter is the PHP engine installed on your computer.

Open ```Settings``` from ```File``` menu.

![Run Test Project - Step 1](http://apidocs.io/illustration/php?step=openSettings&workspaceFolder=DigitalNewzealand-PHP)

Select ```PHP``` from within ```Languages & Frameworks```

![Run Test Project - Step 2](http://apidocs.io/illustration/php?step=setInterpreter0&workspaceFolder=DigitalNewzealand-PHP)

Browse for Interpreters near the ```Interpreter``` option and choose your interpreter.

![Run Test Project - Step 3](http://apidocs.io/illustration/php?step=setInterpreter1&workspaceFolder=DigitalNewzealand-PHP)

Once the interpreter is selected, click ```OK```

![Run Test Project - Step 4](http://apidocs.io/illustration/php?step=setInterpreter2&workspaceFolder=DigitalNewzealand-PHP)

To run your project, right click on your PHP file inside your Test project and click on ```Run```

![Run Test Project - Step 5](http://apidocs.io/illustration/php?step=runProject&workspaceFolder=DigitalNewzealand-PHP)


## How to Test

Unit tests in this SDK can be run using PHPUnit. 

1. First install the dependencies using composer including the `require-dev` dependencies.
2. Run `vendor\bin\phpunit --verbose` from commandline to execute tests. If you have 
   installed PHPUnit globally, run tests using `phpunit --verbose` instead.

You can change the PHPUnit test configuration in the `phpunit.xml` file.

## Initialization

#### Authentication and Initialization
In order to setup authentication and initialization of the API client, you need the following information.

| Parameter | Description |
|-----------|-------------|
| apiKey | Your API Key |



API client can be initialized as following.

```php
// Configuration parameters and credentials
$apiKey = "apiKey"; // Your API Key

$client = new DigitalNewzealandClient($apiKey);
```

# Class Reference
## <a name="list_of_controllers"></a>List of Controllers

* [MetadataController](#metadata_controller)
* [SearchRecordController](#search_record_controller)

## <a name="metadata_controller"></a>![Class: ](http://apidocs.io/img/class.png ".MetadataController") MetadataController


#### Get singleton instance
The singleton instance of the ``` MetadataController ``` class can be accessed from the API Client.
```php
$metadata = $client->getMetadata();
```

### <a name="get_metadata"></a>![Method: ](http://apidocs.io/img/method.png ".MetadataController.getMetadata") getMetadata

> The Get Metadata API call returns the available metadata for a specific item. The Get Metadata v3 request parameters and response format differs significantly from the depreciated Get Metadata v1 & v2 API call.

```php
function getMetadata($options)
```

#### Parameters: 

| Parameter | Tags | Description |
|-----------|------|-------------|
| recordId |  ``` Required ```  | Record IDs are identified in the metadata_url field of a results set. 23034653 is an example record ID. |
| fields |  ``` Required ```  | A comma separated list of fields or groups of fields to be returned for each record. Possible groups include 'default' and 'verbose'. If no value is specified, then the 'default' field group will be returned. |



#### Example Usage:
```php
$recordId = 'record_id';
$collect['recordId'] = $recordId;

$fields = 'fields';
$collect['fields'] = $fields;


$result = $metadata->getMetadata($collect);

```




[Back to List of Controllers](#list_of_controllers)
## <a name="search_record_controller"></a>![Class: ](http://apidocs.io/img/class.png ".SearchRecordController") SearchRecordController


#### Get singleton instance
The singleton instance of the ``` SearchRecordController ``` class can be accessed from the API Client.
```php
$searchRecord = $client->getSearchRecord();
```

### <a name="search_record"></a>![Method: ](http://apidocs.io/img/method.png ".SearchRecordController.searchRecord") searchRecord

> The Search Records API call returns a result set in response to a search query. The v3 Search Records API request parameters and response format differs significantly from the deprecated v1 & v2 Search Records API call.

```php
function searchRecord($options)
```

#### Parameters: 

| Parameter | Tags | Description |
|-----------|------|-------------|
| text |  ``` Required ```  | TODO: Add a parameter description |
| mand |  ``` Optional ```  | Restricts search to records matching all facet values. Example: "&and[content_partner][]=Kete+Horowhenua&and[category][]=Images" |
| mor |  ``` Optional ```  | Restricts search to records matching any of the specified facet values. Example: "&or[category][]=Image&or[category][]=Videos"without |
| without |  ``` Optional ```  | Restricts search to records that don't match any of the facet values. Example: "&without[category][]=Newspapers" |
| page |  ``` Optional ```  ``` DefaultValue ```  | the page when iterating over a set of records. (Defaults to 1.) |
| perPage |  ``` Optional ```  ``` DefaultValue ```  | the number of records the user wishes returned up to a maximum of 100. (Defaults to 20.) |
| facets |  ``` Optional ```  | a list of facet fields to include in the output. See the note on facets below for more information. Example: "&facets=year,category" |
| facetsPage |  ``` Optional ```  ``` DefaultValue ```  | the facet page to iterate over a set of facets. . (Defaults to 1.) |
| facetPerPage |  ``` Optional ```  ``` DefaultValue ```  | the number of facets returned for every page. (Defaults to 10.) |
| sort |  ``` Optional ```  | the field upon which results are sorted. Defaults to relevance sorting. The sort field must be one of: "category", "content_partner", "date", "syndication_date". |
| direction |  ``` Optional ```  | the direction in which the results are sorted. Possible values: "desc", "asc". |
| geoBbox |  ``` Optional ```  | a geographic bounding box scoping a search to a geographic region. Order of latitude-longitude coordinates is north, west, south, east. For example, &geo_bbox=-41,174,-42,175 searches the Wellington region. |



#### Example Usage:
```php
$text = 'text';
$collect['text'] = $text;

$mand = 'and';
$collect['mand'] = $mand;

$mor = 'or';
$collect['mor'] = $mor;

$without = 'without';
$collect['without'] = $without;

$page = 1;
$collect['page'] = $page;

$perPage = 20;
$collect['perPage'] = $perPage;

$facets = 'facets';
$collect['facets'] = $facets;

$facetsPage = 1;
$collect['facetsPage'] = $facetsPage;

$facetPerPage = 10;
$collect['facetPerPage'] = $facetPerPage;

$sort = 'sort';
$collect['sort'] = $sort;

$direction = 'direction';
$collect['direction'] = $direction;

$geoBbox = 219.910241030115;
$collect['geoBbox'] = $geoBbox;


$result = $searchRecord->searchRecord($collect);

```




[Back to List of Controllers](#list_of_controllers)


