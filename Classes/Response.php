<?php

class Response
{
    function return_data($data) {
        $data["code"] = "200";
        echo json_encode(array("data" => $data));
        die;
    }

    function return_response($string) {
        $data = $this->get_data($string);

        // Show only specific data from the error to the user
        $response_arr = array();
        $response_arr["code"] = $data["code"];
        $response_arr["text"] = $data["text"];

        echo json_encode(array("data" => $response_arr));
        die;
    }

    // Get error codes
    function get_data($error_string){
        $error_codes = array(
            "SUCCESS" => [
                "code" => "200",
                "text" => "A successful request!",
            ],
            "UNAUTHORIZED" => [
                "code" => "401",
                "text" => "401 Unauthorized",
            ],
            "INVALID_EMAIL_ADDRESS" => [
                "code" => "IEA-10001",
                "text" => "Please enter a valid email address!",
            ],
            "PASSWORD_CAN_NOT_BE_EMPTY" => [
                "code" => "PE-10002",
                "text" => "Password can not be empty!",
            ],

            "EMAIL_ADDRESS_NOT_FOUND" => [
                "code" => "ENF-10003",
                "text" => "Sorry, Email address not found!",
            ],
            "WRONG_EMAIL_ADDRESS_OR_PASSWORD" => [
                "code" => "WEOP-10004",
                "text" => "Sorry, Wrong email address or password!",
            ],
            "WRONG_CATEGORY_TYPE" => [
                "code" => "WCT-10005",
                "text" => "Sorry, This category type does not exist!",
                "cause" => "Trying to send a request with category type that does not exist!"
            ],
            "LANGUAGE_CODE_NOT_FOUND" => [
                "code" => "LCNF-10006",
                "text" => "Sorry, Language code not found!",
                "cause" => "Trying to set a language that its code does not exist in DB!"
            ],
            "CATEGORY_NAME_CAN_NOT_BE_EMPTY" => [
                "code" => "W-CNCBE-10007",
                "text" => "Sorry, Category name can not be empty!",
                "cause" => "Server found out that category name is empty!"
            ],
            "CATEGORY_HAS_BEEN_CREATED" => [
                "code" => "200",
                "text" => "Category has been created successfully!",
            ],
            "ERROR_WHILE_CREATING_CATEGORY" => [
                "code" => "E-EWCC-10008",
                "text" => "Sorry, An error occurred while creating your category!",
            ],
            "CATEGORY_NOT_FOUND" => [
                "code" => "E-CNF-10009",
                "text" => "Sorry, This category can not be found!",
            ],
            "ERROR_WHILE_UPDATING_CATEGORY" => [
                "code" => "E-EWUC-10010",
                "text" => "Sorry, An error occurred while updating your category!",
            ],
            "NO_CHANGES_HAS_BEEN_MADE" => [
                "code" => "W-NCHBM-10011",
                "text" => "No changes hase been made!",
            ],
            "CATEGORY_NAME_HAS_BEEN_UPDATED" => [
                "code" => "S-CNHBC-10012",
                "text" => "Category name has been updated successfully!",
            ],
            "CAMPAIGN_NAME_CAN_NOT_BE_EMPTY" => [
                "code" => "W-CNCBE-10013",
                "text" => "Sorry, Campaign name can not be empty!",
                "cause" => "Server found out that campaign name is empty!"
            ],
            "PLEASE_ENTER_A_VALID_DATE" => [
                "code" => "W-PEAVD-10014",
                "text" => "Please enter a valid date!",
            ],
            "CAMPAIGN_HAS_BEEN_CREATED" => [
                "code" => "200",
                "text" => "Campaign has been created successfully!",
            ],
            "ERROR_WHILE_CREATING_CAMPAIGN" => [
                "code" => "E-EWCC-10015",
                "text" => "Sorry, An error occurred while creating your campaign!",
            ],
            "SORRY_THIS_CAMPAIGN_DOES_NOT_EXIST" => [
                "code" => "E-CDNE-10016",
                "text" => "Sorry, This campaign does not exist!",
            ],
            "SORRY_YOU_DONT_OWN_THIS_CAMPAIGN" => [
                "code" => "E-YDOTC-10017",
                "text" => "Sorry, You dont own this campaign!",
            ],
            "CAMPAIGN_HAS_BEEN_UPDATED" => [
                "code" => "S-CHBC-10018",
                "text" => "Campaign has been updated successfully!",
            ],
            "ERROR_WHILE_UPDATING_CAMPAIGN" => [
                "code" => "E-EWUC-10019",
                "text" => "Sorry, An error occurred while updating your campaign!",
            ],
        );
        return $error_codes[$error_string];
    }
}



