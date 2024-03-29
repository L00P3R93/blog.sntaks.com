<?php
date_default_timezone_set("Africa/Nairobi");

define('APPID', 1192);
define('ADMIN_MAIL', 'admin@your-server.com');
define('FULL_DATE', date('Y-m-d H:i:s'));
define('NOW_', date('Y-m-d H:i:s'));
define('DATE_', date('Y-m-d'));
define('YEAR_', date('Y'));
define('MONTH_', date('m'));
define('DAY_', date('d'));


/**
 * Encrypts given value
 * @param $id
 * @return float|int
 */
function valueEncrypt($id){
    return $id * APPID;
}

/**
 * decrypts given value
 * @param $id
 * @return float|int
 */
function valueDecrypt($id){
    return $id / APPID;
}

/**
 * Checks if two values match and return given value
 * @param $value1
 * @param $value2
 * @param $return
 * @return string
 */
function selected($value1, $value2, $return){
    return $value1 === $value2 ? $return : "";
}

/**
 * Checks if a value is in array and returns the specified value
 * @param $needle
 * @param $haystack
 * @param $return
 * @return string
 */
function selector($needle, $haystack, $return){
    return in_array($needle, $haystack)?$return:'';
}

/**
 * Capitalizes the first letter of given string
 * @param $string
 * @return string
 */
function uni_name($string){
    return ucwords(strtolower($string));
}

/**
 * Generates encrypted password using SHA256 algorithm
 * @param $pass
 * @return string
 */
function passencrypt($pass){
    $oursalt = crazyString(32);
    $longpass = $oursalt . $pass;
    $hash = hash('SHA256', $longpass);
    return $hash . $oursalt;
}

/**
 * Generates a random string
 * @param $length
 * @return string
 */
function generateRandomString($length){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/**
 * Generates a random String to be used as salt
 * @param $length
 * @return string
 */
function crazyString($length){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#%^*()_+-~{}[];:|.<>';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/**
 * Checks if value given is empty or not
 * @param $x
 * @return int
 */
function input_available($x){
    return !empty(rtrim($x)) ? 1 : 0;
}

/**
 * Checks the length of given value
 * @param $x
 * @param $l
 * @return int
 */
function input_length($x, $l){
    return strlen(rtrim($x)) < $l ? 0 : 1;
}

/**
 * Validates phone number given
 * Ensures format is 2547XX XXX XXX
 * @param $phone
 * @return int
 */
function validate_phone($phone){
    return (strlen($phone) == 12 and substr($phone, 0, 3) == "254") ? 1 : 0;
}

/**
 * Finds the time passed from now
 * @param $datetime
 * @param bool $full
 * @return string
 * @throws Exception
 */
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

/**
 * Adds a date from the given year, month or day
 * @param $date
 * @param $year
 * @param $months
 * @param $days
 * @return false|string
 */
function date_add_($date, $year, $months, $days){
    return date('Y-m-d', strtotime($date." + $year years + $months months + $days days"));
}

/**
 * Subtracts a date from the given year, month or day
 * @param $date
 * @param $year
 * @param $months
 * @param $days
 * @return false|string
 */
function date_sub_($date, $year, $months, $days){
    return date('Y-m-d', strtotime($date." - $year years - $months months - $days days"));
}

/**
 * Validates a given file type according to search array given
 * @param $file_name
 * @param $search_array
 * @return int
 */
function file_type($file_name, $search_array){
    $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    return in_array("$ext", $search_array) ? 1: 0;
}

/**
 * Uploads a file and gives the uploaded file a new encrypted name
 * @param $file_name
 * @param $temp_name
 * @param $upload_dir
 * @return int|string
 */
function upload_file($file_name, $temp_name, $upload_dir){
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $new_file_name = generateRandomString(10).".$ext";
    $file_path = $upload_dir.$new_file_name;
    return move_uploaded_file($temp_name, $file_path) ? $new_file_name : 0;
}

/**
 * Returns a error alert
 * @param $x
 * @return string
 */
function error($x){
    return "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>$x</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
}

/**
 * Returns a success alert
 * @param $x
 * @return string
 */
function success($x){
    return "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$x</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
}

/**
 * Returns an info alert
 * @param $x
 * @return string
 */
function notice($x){
    return "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                    <strong>$x</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
}

/**
 * Returns a Warning alert
 * @param $x
 * @return string
 */
function warning($x){
    return "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$x</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
}

/**
 * Returns the status badge of the given state
 * @param $state
 * @return string
 */
function admin_status($state){
    switch ($state){
        case 1:
            $status = "<span class='badge badge-success'>Active</span>";
            break;
        case 2:
            $status = "<span class='badge badge-danger'>Blocked</span>";
            break;
        case 3:
            $status = "<span class='badge badge-secondary'>Former</span>";
            break;
        case 4:
            $status = "<span class='badge badge-default'>In-Active</span>";
            break;
        default:
            $status = "----";
            break;
    }
    return $status;
}

/**
 * Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * @param string $email The email address
 * @param int $s Size in pixels, defaults to 80px [ 1 - 2048 ]
 * @param string $d Default imageset to use [ 404 | mp | identicon | monsterid | wavatar ]
 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
 * @param bool $img True to return a complete IMG tag False for just the URL
 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
 * @return String containing either just a URL or a complete image tag
 * @source https://gravatar.com/site/implement/images/php/
 */
function get_gravatar( $email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array() ) {
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}

/**
 * Finds whether a value is in a mulitdimensional array
 * @param $needle
 * @param $haystack
 * @param bool $strict
 * @return bool
 */
function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }
    return false;
}

/**
 * @param $object
 * @return array
 */
function objectToArray ($object) {
    if(!is_object($object) && !is_array($object)) return $object;
    return array_map('objectToArray', (array) $object);
}

/**
 * Shortens a string to a specified length by trimming it and adding an ellipsis.
 *
 * @param string $string The string to be shortened.
 * @param int $length The maximum length of the shortened string. Default is 100.
 *
 * @return string The shortened string.
 */
function shortenString($string, $length = 100) {
    // Trim the string to the maximum length
    $shortString = substr($string, 0, $length);

    // Find the last space before the end of the string
    $lastSpace = strrpos($shortString, ' ');

    // If the last space was found...
    if ($lastSpace !== false) {
        // Remove everything after the last space
        $shortString = substr($shortString, 0, $lastSpace);
    }

    // Add an ellipsis to the end of the string
    $shortString .= '...';

    // Return the shortened string
    return $shortString;
}


/**
 * @param $value
 * @param $return
 * @return mixed
 */
function not_empty($value, $return){
    return (isset($value) and !empty($value))?$value: $return;
}

/**
 * @param $email
 * @param bool $checkDNS
 * @return int
 */
function isValidEmail($email, $checkDNS = false){
    //	Check that $email is a valid address. Read the following RFCs to understand the constraints:
    //		(http://tools.ietf.org/html/rfc5322)
    //		(http://tools.ietf.org/html/rfc3696)
    //		(http://tools.ietf.org/html/rfc5321)
    //		(http://tools.ietf.org/html/rfc4291#section-2.2)
    //		(http://tools.ietf.org/html/rfc1123#section-2.1)

    //	the upper limit on address lengths should normally be considered to be 256
    //		(http://www.rfc-editor.org/errata_search.php?rfc=3696)
    //		NB I think John Klensin is misreading RFC 5321 and the the limit should actually be 254
    //		However, I will stick to the published number until it is changed.
    //
    //	The maximum total length of a reverse-path or forward-path is 256
    //	characters (including the punctuation and element separators)
    //		(http://tools.ietf.org/html/rfc5321#section-4.5.3.1.3)
    $emailLength = strlen($email);
    if ($emailLength > 256)	return 0;

    //	Contemporary email addresses consist of a "local part" separated from
    //	a "domain part" (a fully-qualified domain name) by an at-sign ("@").
    //		(http://tools.ietf.org/html/rfc3696#section-3)
    $atIndex = strrpos($email,'@');

    if ($atIndex === false)	return 0;	//	No at-sign
    if ($atIndex === 0)	return 0;	//	No local part
    if ($atIndex === $emailLength) return 0;	//	No domain part
    //	Sanitize comments
    //	- remove nested comments, quotes and dots in comments
    //	- remove parentheses and dots from quoted strings
    $braceDepth		= 0;
    $inQuote		= false;
    $escapeThisChar	= false;

    for ($i = 0; $i < $emailLength; ++$i) {
        $char = $email[$i];
        $replaceChar = false;

        if ($char === '\\') {
            $escapeThisChar = !$escapeThisChar;	//	Escape the next character?
        } else {
            switch ($char) {
                case '(':
                    if ($escapeThisChar) {
                        $replaceChar = true;
                    } else {
                        if ($inQuote) {
                            $replaceChar = true;
                        } else {
                            if ($braceDepth++ > 0) $replaceChar = true;	//	Increment brace depth
                        }
                    }

                    break;
                case ')':
                    if ($escapeThisChar) {
                        $replaceChar = true;
                    } else {
                        if ($inQuote) {
                            $replaceChar = true;
                        } else {
                            if (--$braceDepth > 0) $replaceChar = true;	//	Decrement brace depth
                            if ($braceDepth < 0) $braceDepth = 0;
                        }
                    }

                    break;
                case '"':
                    if ($escapeThisChar) {
                        $replaceChar = true;
                    } else {
                        if ($braceDepth === 0) {
                            $inQuote = !$inQuote;	//	Are we inside a quoted string?
                        } else {
                            $replaceChar = true;
                        }
                    }

                    break;
                case '.':	//	Dots don't help us either
                    if ($escapeThisChar) {
                        $replaceChar = true;
                    } else {
                        if ($braceDepth > 0) $replaceChar = true;
                    }

                    break;
            }

            $escapeThisChar = false;
            if ($replaceChar) $email[$i] = 'x';	//	Replace the offending character with something harmless
        }
    }

    $localPart		= substr($email, 0, $atIndex);
    $domain			= substr($email, $atIndex + 1);
    $FWS			= "(?:(?:(?:[ \\t]*(?:\\r\\n))?[ \\t]+)|(?:[ \\t]+(?:(?:\\r\\n)[ \\t]+)*))";	//	Folding white space
    //	Let's check the local part for RFC compliance...
    //
    //	local-part      =       dot-atom / quoted-string / obs-local-part
    //	obs-local-part  =       word *("." word)
    //		(http://tools.ietf.org/html/rfc5322#section-3.4.1)
    //
    //	Problem: need to distinguish between "first.last" and "first"."last"
    //	(i.e. one element or two). And I suck at regexes.
    $dotArray	= /*. (array[int]string) .*/ preg_split('/\\.(?=(?:[^\\"]*\\"[^\\"]*\\")*(?![^\\"]*\\"))/m', $localPart);
    $partLength = 0;

    foreach ($dotArray as $element) {
        //	Remove any leading or trailing FWS
        $element = preg_replace("/^$FWS|$FWS\$/", '', $element);

        //	Then we need to remove all valid comments (i.e. those at the start or end of the element
        $elementLength = strlen($element);

        if ($element[0] === '(') {
            $indexBrace = strpos($element, ')');
            if ($indexBrace !== false) {
                if (preg_match('/(?<!\\\\)[\\(\\)]/', substr($element, 1, $indexBrace - 1)) > 0) {
                    return 0;	//	Illegal characters in comment
                }
                $element = substr($element, $indexBrace + 1, $elementLength - $indexBrace - 1);
                $elementLength = strlen($element);
            }
        }

        if ($element[$elementLength - 1] === ')') {
            $indexBrace = strrpos($element, '(');
            if ($indexBrace !== false) {
                if (preg_match('/(?<!\\\\)(?:[\\(\\)])/', substr($element, $indexBrace + 1, $elementLength - $indexBrace - 2)) > 0) {
                    return 0;	//	Illegal characters in comment
                }
                $element = substr($element, 0, $indexBrace);
                $elementLength = strlen($element);
            }
        }

        //	Remove any leading or trailing FWS around the element (inside any comments)
        $element = preg_replace("/^$FWS|$FWS\$/", '', $element);

        //	What's left counts towards the maximum length for this part
        if ($partLength > 0) $partLength++;	//	for the dot
        $partLength += strlen($element);

        //	Each dot-delimited component can be an atom or a quoted string
        //	(because of the obs-local-part provision)
        if (preg_match('/^"(?:.)*"$/s', $element) > 0) {
            //	Quoted-string tests:
            //
            //	Remove any FWS
            $element = preg_replace("/(?<!\\\\)$FWS/", '', $element);
            //	My regex skillz aren't up to distinguishing between \" \\" \\\" \\\\" etc.
            //	So remove all \\ from the string first...
            $element = preg_replace('/\\\\\\\\/', ' ', $element);
            if (preg_match('/(?<!\\\\|^)["\\r\\n\\x00](?!$)|\\\\"$|""/', $element) > 0)	return 0;	//	", CR, LF and NUL must be escaped, "" is too short
        } else {
            //	Unquoted string tests:
            //
            //	Period (".") may...appear, but may not be used to start or end the
            //	local part, nor may two or more consecutive periods appear.
            //		(http://tools.ietf.org/html/rfc3696#section-3)
            //
            //	A zero-length element implies a period at the beginning or end of the
            //	local part, or two periods together. Either way it's not allowed.
            if ($element === '') return 0;	//	Dots in wrong place

            //	Any ASCII graphic (printing) character other than the
            //	at-sign ("@"), backslash, double quote, comma, or square brackets may
            //	appear without quoting.  If any of that list of excluded characters
            //	are to appear, they must be quoted
            //		(http://tools.ietf.org/html/rfc3696#section-3)
            //
            //	Any excluded characters? i.e. 0x00-0x20, (, ), <, >, [, ], :, ;, @, \, comma, period, "
            if (preg_match('/[\\x00-\\x20\\(\\)<>\\[\\]:;@\\\\,\\."]/', $element) > 0)	return 0;	//	These characters must be in a quoted string
        }
    }

    if ($partLength > 64) return 0;	// Local part must be 64 characters or less

    //	Now let's check the domain part...

    //	The domain name can also be replaced by an IP address in square brackets
    //		(http://tools.ietf.org/html/rfc3696#section-3)
    //		(http://tools.ietf.org/html/rfc5321#section-4.1.3)
    //		(http://tools.ietf.org/html/rfc4291#section-2.2)
    if (preg_match('/^\\[(.)+]$/', $domain) === 1) {
        //	It's an address-literal
        $addressLiteral = substr($domain, 1, strlen($domain) - 2);
        $matchesIP		= array();

        //	Extract IPv4 part from the end of the address-literal (if there is one)
        if (preg_match('/\\b(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/', $addressLiteral, $matchesIP) > 0) {
            $index = strrpos($addressLiteral, $matchesIP[0]);

            if ($index === 0) {
                //	Nothing there except a valid IPv4 address, so...
                return 1;
            } else {
                //	Assume it's an attempt at a mixed address (IPv6 + IPv4)
                if ($addressLiteral[$index - 1] !== ':') return 0;	//	Character preceding IPv4 address must be ':'
                if (substr($addressLiteral, 0, 5) !== 'IPv6:')	return 0;	//	RFC5321 section 4.1.3

                $IPv6 = substr($addressLiteral, 5, ($index ===7) ? 2 : $index - 6);
                $groupMax = 6;
            }
        } else {
            //	It must be an attempt at pure IPv6
            if (substr($addressLiteral, 0, 5) !== 'IPv6:') return 0;	//	RFC5321 section 4.1.3
            $IPv6 = substr($addressLiteral, 5);
            $groupMax = 8;
        }

        $groupCount	= preg_match_all('/^[0-9a-fA-F]{0,4}|\\:[0-9a-fA-F]{0,4}|(.)/', $IPv6, $matchesIP);
        $index		= strpos($IPv6,'::');

        if ($index === false) {
            //	We need exactly the right number of groups
            if ($groupCount !== $groupMax)	return 0;	//	RFC5321 section 4.1.3
        } else {
            if ($index !== strrpos($IPv6,'::')) return 0;	//	More than one '::'
            $groupMax = ($index === 0 || $index === (strlen($IPv6) - 2)) ? $groupMax : $groupMax - 1;
            if ($groupCount > $groupMax) return 0;	//	Too many IPv6 groups in address
        }

        //	Check for unmatched characters
        array_multisort($matchesIP[1], SORT_DESC);
        if ($matchesIP[1][0] !== '') return 0;	//	Illegal characters in address

        //	It's a valid IPv6 address, so...
        return 1;
    }
    else {
        //	It's a domain name...

        //	The syntax of a legal Internet host name was specified in RFC-952
        //	One aspect of host name syntax is hereby changed: the
        //	restriction on the first character is relaxed to allow either a
        //	letter or a digit.
        //		(http://tools.ietf.org/html/rfc1123#section-2.1)
        //
        //	NB RFC 1123 updates RFC 1035, but this is not currently apparent from reading RFC 1035.
        //
        //	Most common applications, including email and the Web, will generally not
        //	permit...escaped strings
        //		(http://tools.ietf.org/html/rfc3696#section-2)
        //
        //	the better strategy has now become to make the "at least one period" test,
        //	to verify LDH conformance (including verification that the apparent TLD name
        //	is not all-numeric)
        //		(http://tools.ietf.org/html/rfc3696#section-2)
        //
        //	Characters outside the set of alphabetic characters, digits, and hyphen MUST NOT appear in domain name
        //	labels for SMTP clients or servers
        //		(http://tools.ietf.org/html/rfc5321#section-4.1.2)
        //
        //	RFC5321 precludes the use of a trailing dot in a domain name for SMTP purposes
        //		(http://tools.ietf.org/html/rfc5321#section-4.1.2)
        $dotArray	= /*. (array[int]string) .*/ preg_split('/\\.(?=(?:[^\\"]*\\"[^\\"]*\\")*(?![^\\"]*\\"))/m', $domain);
        $partLength = 0;

        if (count($dotArray) === 1)	return 0;	//	Mail host can't be a TLD

        foreach ($dotArray as $element) {
            //	Remove any leading or trailing FWS
            $element = preg_replace("/^$FWS|$FWS\$/", '', $element);

            //	Then we need to remove all valid comments (i.e. those at the start or end of the element
            $elementLength = strlen($element);

            if ($element[0] === '(') {
                $indexBrace = strpos($element, ')');
                if ($indexBrace !== false) {
                    if (preg_match('/(?<!\\\\)[\\(\\)]/', substr($element, 1, $indexBrace - 1)) > 0) {
                        return 0;	//	Illegal characters in comment
                    }
                    $element = substr($element, $indexBrace + 1, $elementLength - $indexBrace - 1);
                    $elementLength = strlen($element);
                }
            }

            if ($element[$elementLength - 1] === ')') {
                $indexBrace = strrpos($element, '(');
                if ($indexBrace !== false) {
                    if (preg_match('/(?<!\\\\)(?:[\\(\\)])/', substr($element, $indexBrace + 1, $elementLength - $indexBrace - 2)) > 0) {
                        return 0;	//	Illegal characters in comment
                    }
                    $element = substr($element, 0, $indexBrace);
                    $elementLength = strlen($element);
                }
            }

            //	Remove any leading or trailing FWS around the element (inside any comments)
            $element = preg_replace("/^$FWS|$FWS\$/", '', $element);

            //	What's left counts towards the maximum length for this part
            if ($partLength > 0) $partLength++;	//	for the dot
            $partLength += strlen($element);

            //	The DNS defines domain name syntax very generally -- a
            //	string of labels each containing up to 63 8-bit octets,
            //	separated by dots, and with a maximum total of 255
            //	octets.
            //		(http://tools.ietf.org/html/rfc1123#section-6.1.3.5)
            if ($elementLength > 63) return 0;	//	Label must be 63 characters or less

            //	Each dot-delimited component must be atext
            //	A zero-length element implies a period at the beginning or end of the
            //	local part, or two periods together. Either way it's not allowed.
            if ($elementLength === 0) return 0;	//	Dots in wrong place

            //	Any ASCII graphic (printing) character other than the
            //	at-sign ("@"), backslash, double quote, comma, or square brackets may
            //	appear without quoting.  If any of that list of excluded characters
            //	are to appear, they must be quoted
            //		(http://tools.ietf.org/html/rfc3696#section-3)
            //
            //	If the hyphen is used, it is not permitted to appear at
            //	either the beginning or end of a label.
            //		(http://tools.ietf.org/html/rfc3696#section-2)
            //
            //	Any excluded characters? i.e. 0x00-0x20, (, ), <, >, [, ], :, ;, @, \, comma, period, "
            if (preg_match('/[\\x00-\\x20\\(\\)<>\\[\\]:;@\\\\,\\."]|^-|-$/', $element) > 0) {
                return 0;
            }
        }

        if ($partLength > 255) return 0;	// Local part must be 64 characters or less

        if (preg_match('/^[0-9]+$/', $element) > 0) return 0;	//	TLD can't be all-numeric

        //	Check DNS?
        if ($checkDNS && function_exists('checkdnsrr')) {
            if (!(checkdnsrr($domain, 'A') || checkdnsrr($domain, 'MX'))) {
                return 0;	//	Domain doesn't actually exist
            }
        }
    }

    //	Eliminate all other factors, and the one which remains must be the truth.
    //		(Sherlock Holmes, The Sign of Four)
    return 1;
}

function get_title_page(){
    $uri = $_SERVER['REQUEST_URI'];
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $p = explode('/', $url);
    $page = end($p);

    if (strpos($page, '?') !== false) {
        $p = explode('?', $page);
        $page = $p[0];
    }

    return $page;
}

function getGender($uid){
    return ($uid == 1)? "Male": "Female";
}

function dd(...$args){
    echo '<pre>';
    foreach ($args as $arg) {
        print_r($arg);
        echo '<br>';
    }
    echo '</pre>';
    die;
}

function camelize( $string){
    return (
    str_replace(
        ' ',
        '',
        ucwords(
            preg_replace('/[^a-zA-Z0-9\x7f-\xff]++/', ' ', $string)
        )
    )
    );
}

/**
 * only containing letters and having more than 3 letters
 * @param $name
 * @return bool
 */
function isValidName($name){
    $cleanedName = preg_replace('/\s+/', '', $name);
    if(!ctype_alpha($cleanedName)) return false;
    if(strlen($cleanedName) < 3) return false;
    return true;
}

function isValidIdNo($idNo){
    if(strlen($idNo) < 5 or strlen($idNo) > 10) return false;
    if(!preg_match('/^\d+$/', $idNo)) return false;
    // TODO: Additional validation logic using APIs
    return true;
}

function isValidPhoneNo($phoneNo){
    $cleanedNo = preg_replace('/[ -]/','', $phoneNo);
    if(preg_match('/^2547\d{8}$/', $cleanedNo) or preg_match('/^2541\d{8}$/', $cleanedNo)) return true;
    else return false;
}

function isValidDate($date){
    return !empty($date) && preg_match("/^\d{4}-\d{2}-\d{2}$/", $date) && strtotime($date) !== false;
}

function isValidDob($dob){
    if(isValidDate($dob)){
        $birthDate = new DateTime($dob);
        $today = new DateTime();
        $age = $today->diff($birthDate)->y;

        return $age >= 18;
    }
    return false;

}

function getJobType($jobType){
    return ($jobType == 2)? "Contract": "Permanent";
}

function getSection($section){
    return ($section == 2) ? "HQ" : "Mombasa";
}
