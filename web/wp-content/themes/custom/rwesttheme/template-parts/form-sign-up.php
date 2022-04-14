<?php


/**
 * Subscriber Signup Form Anlytics
 *
 * @desc When Gravity Form (ID: 2) is submitted, send analytics data
 *
 * @param $confirmation ()
 * @param $form ()
 * @param $entry ()
 *
 * @return $confirmation ()
 *
 */
add_filter( 'gform_confirmation_2', 'subscriberSignupFormAnalytics', 10, 3 );
function subscriberSignupFormAnalytics( $confirmation, $form, $entry ) {

	// subscriberSignupFormSubmission( $form_fields );

	$form_fields = array(
		'email' => rgar( $entry, '1' ),
		'event_category' => rgar( $entry, '2' ),
		'event_label' => rgar( $entry, '3' )
	);

	?>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-104941255-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-104941255-1');
		gtag('event', 'click', {
			'event_category': '<?php echo $form_fields['event_category']; ?>',
			'event_label': '<?php echo $form_fields['event_category']; ?>'
		});
	</script>
	<?php

	return $confirmation;
}


/**
 * Subscriber Sign Up Form Submission
 *
 * @desc Send Sign Up form data to Salesforce Master Data Extension
 * @param $form_fields (array) Array of fields to send to SFMC
 *
 */
function subscriberSignupFormSubmission( $form_fields ) {
	if ( !empty( $form_fields['email'] ) ) {

		$data_url = 'https://mc9w5xktcdpv3lcxkkt5lj7lrn48.rest.marketingcloudapis.com/interaction/v1/events';
		$formData = [
			"ContactKey" => $form_fields['email'],
			"EventDefinitionKey" => "APIEvent-375d09f8-cf4f-7b1f-5b7e-afc2de5e5c56",
			"Data" => [
				"EmailAddress" => $form_fields['email']
			]
		];
		$token = getAuthToken();

		$data_result = rwestSalesforceSubmit( $data_url, json_encode($formData), 1, $token );
	}
}


/**
 * Get SFMC Auth Token
 *
 * @desc Get an Auth Token from Salesforce
 *
 * @return $token (string) An auth Token from Salesforce
 *
 */
function getAuthToken() {
	$url = 'https://mc9w5xktcdpv3lcxkkt5lj7lrn48.auth.marketingcloudapis.com/v2/token';
	$fields = array(
		'grant_type'=> 'client_credentials',
		'client_id'=> 'lloxkh6y5aqjkyd6hq2hidhz',
		'client_secret'=> 'eRXklmVp5sg1gS3wp8i4kg4M',
		'account_id' => '100024984'
	);
	$fields_string = createFieldsString( $fields );

	$result = json_decode( rwestSalesforceSubmit( $url, $fields_string, 0, 1 ) );
	$token = ''.$result->access_token.'';

	return $token;
}


/**
 * Create Fields String
 *
 * @desc Combine array values into a string of url parameters usbable
 *  for SFMC submissions
 * @param $fields (array) Array of fields to send to SFMC
 *
 * @return $fields_string (string) A string representation of the
 * 	$fields array
 *
 */
function createFieldsString( $fields ) {
	$fields_string = '';
	$count = 0;
	foreach( $fields as $key => $value ) {
		$count++;
		$fields_string .= $key.'='.$value;
		if($count < 4){
			$fields_string .='&';
		}
	}
	return $fields_string;
}



function rwestSalesforceSubmit( $url, $fields_string, $flg, $token ) {
	$ch = curl_init();
	if ($flg == 1) {
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer ' . $token ));
		curl_setopt($ch, CURLOPT_HEADER, 1);
	}
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_POST,1);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}
