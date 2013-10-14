<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/*
|--------------------------------------------------------------------------
| HTTP Status codes that can be used for the API
|--------------------------------------------------------------------------
|
| Here is a list of HTTP status codes to be returned as part of the 
| response in the header. The list makes the status code readable and
| doesn't require memorization for the developer. 
|
| This does not include all status codes. Just codes that would be most
| useful for a REST API. Some 200s did not seem to make sense and we
| would not present redirect responses.
|
| Successful requests - 200s
|
*/
define('HTTP_STATUS_OK', 200);								// The request has succeeded.
define('HTTP_STATUS_CREATED', 201);							// The request has been fulfilled and resulted in a new resource being created.
define('HTTP_STATUS_ACCEPTED', 202);						// The request has been accepted for processing, but the processing has not been completed.
/*
| Client Errors - 400s
*/
define('HTTP_STATUS_BAD_REQUEST', 400);						// The request could not be understood by the server due to malformed syntax.
define('HTTP_STATUS_UNAUTHORIZED', 401); 					// The request requires user authentication.
define('HTTP_STATUS_PAYMENT_REQUIRED', 402); 				// This code is reserved for future use.
define('HTTP_STATUS_FORBIDDEN', 403); 						// The server understood the request, but is refusing to fulfill it.
define('HTTP_STATUS_NOT_FOUND', 404); 						// The server has not found anything matching the Request-URI.
define('HTTP_STATUS_METHOD_NOT_ALLOWED', 405); 				// The method specified in the Request-Line is not allowed for the resource identified by the Request-URI.
define('HTTP_STATUS_NOT_ACCEPTABLE', 406); 					// The resource identified by the request is only capable of generating response entities which have content characteristics not acceptable according to the accept headers sent in the request.
define('HTTP_STATUS_PROXY_AUTH_REQUIRED', 407); 			// This code is similar to 401 (Unauthorized), but indicates that the client must first authenticate itself with the proxy.
define('HTTP_STATUS_REQUEST_TIMEOUT', 408);					// The client did not produce a request within the time that the server was prepared to wait.
define('HTTP_STATUS_CONFLICT', 409);						// The request could not be completed due to a conflict with the current state of the resource.
define('HTTP_STATUS_GONE', 410);							// The requested resource is no longer available at the server and no forwarding address is known.
define('HTTP_STATUS_LENGTH_REQUIRED', 411);					// The server refuses to accept the request without a defined Content- Length.
define('HTTP_STATUS_PRECONDITION_FAILED', 412);				// The precondition given in one or more of the request-header fields evaluated to false when it was tested on the server.
define('HTTP_STATUS_REQUEST_ENTITY_TOO_LARGE', 413);		// The server is refusing to process a request because the request entity is larger than the server is willing or able to process.
define('HTTP_STATUS_REQUEST_URI_TOO_LONG', 414);			// The server is refusing to service the request because the Request-URI is longer than the server is willing to interpret.
define('HTTP_STATUS_UNSUPPORTED_MEDIA_TYPE', 415);			// The server is refusing to service the request because the entity of the request is in a format not supported by the requested resource for the requested method.
define('HTTP_STATUS_REQUESTED_RANGE_NOT_SATISIABLE', 416);	// A server SHOULD return a response with this status code if a request included a Range request-header field (section 14.35), and none of the range-specifier values in this field overlap the current extent of the selected resource, and the request did not include an If-Range request-header field. 
define('HTTP_STATUS_EXPECTATION_FAILED', 417);				// The expectation given in an Expect request-header field (see section 14.20) could not be met by this server, or, if the server is a proxy, the server has unambiguous evidence that the request could not be met by the next-hop server.
/*
| Server Errors - 500s
*/
define('HTTP_STATUS_INTERNAL_SERVER_ERROR', 500);			// The server encountered an unexpected condition which prevented it from fulfilling the request.
define('HTTP_STATUS_NOT_IMPLEMENTED', 501);					// The server does not support the functionality required to fulfill the request.
define('HTTP_STATUS_BAD_GATEWAY', 502);						// The server, while acting as a gateway or proxy, received an invalid response from the upstream server it accessed in attempting to fulfill the request.
define('HTTP_STATUS_SERVICE_UNAVAILABLE', 503);				// The server is currently unable to handle the request due to a temporary overloading or maintenance of the server.
define('HTTP_STATUS_GATEWAY_TIMEOUT', 504);					// The server, while acting as a gateway or proxy, did not receive a timely response from the upstream server specified by the URI (e.g. HTTP, FTP, LDAP) or some other auxiliary server (e.g. DNS) it needed to access in attempting to complete the request.
define('HTTP_STATUS_HTTP_VERSION_NOT_SUPPORTED', 505);		// The server does not support, or refuses to support, the HTTP protocol version that was used in the request message.


/* End of file constants.php */
/* Location: ./application/config/constants.php */