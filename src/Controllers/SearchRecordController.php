<?php
/*
 * DigitalNewzealandLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ) on 09/27/2016
 */

namespace DigitalNewzealandLib\Controllers;

use DigitalNewzealandLib\APIException;
use DigitalNewzealandLib\APIHelper;
use DigitalNewzealandLib\Configuration;
use DigitalNewzealandLib\Models;
use DigitalNewzealandLib\Exceptions;
use DigitalNewzealandLib\Http\HttpRequest;
use DigitalNewzealandLib\Http\HttpResponse;
use DigitalNewzealandLib\Http\HttpMethod;
use DigitalNewzealandLib\Http\HttpContext;
use Unirest\Request;

/**
 * @todo Add a general description for this controller.
 */
class SearchRecordController extends BaseController {

    /**
     * @var SearchRecordController The reference to *Singleton* instance of this class
     */
    private static $instance;
    
    /**
     * Returns the *Singleton* instance of this class.
     * @return SearchRecordController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * The Search Records API call returns a result set in response to a search query. The v3 Search Records API request parameters and response format differs significantly from the deprecated v1 & v2 Search Records API call.
     * @param  array  $options    Array with all options for search
     * @param  string      $options['text']               Required parameter: Example: 
     * @param  string      $options['mand']               Optional parameter: Restricts search to records matching all facet values. Example: "&and[content_partner][]=Kete+Horowhenua&and[category][]=Images"
     * @param  string      $options['mor']                Optional parameter: Restricts search to records matching any of the specified facet values. Example: "&or[category][]=Image&or[category][]=Videos"without
     * @param  string      $options['without']            Optional parameter: Restricts search to records that don't match any of the facet values. Example: "&without[category][]=Newspapers"
     * @param  integer     $options['page']               Optional parameter: the page when iterating over a set of records. (Defaults to 1.)
     * @param  integer     $options['perPage']            Optional parameter: the number of records the user wishes returned up to a maximum of 100. (Defaults to 20.)
     * @param  string      $options['facets']             Optional parameter: a list of facet fields to include in the output. See the note on facets below for more information. Example: "&facets=year,category"
     * @param  integer     $options['facetsPage']         Optional parameter: the facet page to iterate over a set of facets. . (Defaults to 1.)
     * @param  integer     $options['facetPerPage']       Optional parameter: the number of facets returned for every page. (Defaults to 10.)
     * @param  string      $options['sort']               Optional parameter: the field upon which results are sorted. Defaults to relevance sorting. The sort field must be one of: "category", "content_partner", "date", "syndication_date".
     * @param  string      $options['direction']          Optional parameter: the direction in which the results are sorted. Possible values: "desc", "asc".
     * @param  double      $options['geoBbox']            Optional parameter: a geographic bounding box scoping a search to a geographic region. Order of latitude-longitude coordinates is north, west, south, east. For example, &geo_bbox=-41,174,-42,175 searches the Wellington region.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function searchRecord (
                $options) 
    {
        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/v3/records.json';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'text'           => $this->val($options, 'text'),
            'and'            => $this->val($options, 'mand'),
            'or'             => $this->val($options, 'mor'),
            'without'        => $this->val($options, 'without'),
            'page'           => $this->val($options, 'page', 1),
            'per_page'       => $this->val($options, 'perPage', 20),
            'facets'         => $this->val($options, 'facets'),
            'facets_page'    => $this->val($options, 'facetsPage', 1),
            'facet_per_page' => $this->val($options, 'facetPerPage', 10),
            'sort'           => $this->val($options, 'sort'),
            'direction'      => $this->val($options, 'direction'),
            'geo_bbox'       => $this->val($options, 'geoBbox'),
            'api_key' => Configuration::$apiKey,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'APIMATIC 2.0',
            'Accept'        => 'application/json'
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);            
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        //call on-after Http callback
        if($this->getHttpCallBack() != null) {
            $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
            $_httpContext = new HttpContext($_httpRequest, $_httpResponse);
            
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);            
        }

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 208)) { //[200,208] = HTTP OK
            throw new APIException("HTTP Response Not OK", $_httpContext);
        }

        $mapper = $this->getJsonMapper();

        return $mapper->map($response->body, new Models\CollectionSearchRecords());
    }
        


    /**
	 * Array access utility method
     * @param  array          $arr         Array of values to read from
     * @param  string         $key         Key to get the value from the array
     * @param  mixed|null     $default     Default value to use if the key was not found
     * @return mixed
     */
    private function val($arr, $key, $default = NULL)
    {
        if(isset($arr[$key])) {
            return is_bool($arr[$key]) ? var_export($arr[$key], true) : $arr[$key];
        }
        return $default;
    }

}