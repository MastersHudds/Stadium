
<?php
/**
* class for build form
*/ 
class formBuilder
{
    var $form_id; // form id
    var $validators=" ";
    function build($type,$name,$id,$class,$placeholder,$opt)//for create input types with given atributes
    {
        if ($type=="text") // if text box
        {
            $input="<input type='text' name='$name' id='$id' class='$class' placeholder='$placeholder' $opt>";
            echo $input;
        }
        if ($type=="date") // if text box
        {
            $input="<input type='date' name='$name' id='$id' class='$class' placeholder='$placeholder' $opt>";
            echo $input;
        }
        if ($type=="number") // if number box
        {
            $input="<input type='number' name='$name' id='$id' class='$class' $opt>";
            echo $input;
        }
        if ($type=="email") // if email
        {
            $input="<input type='email' name='$name' id='$id' class='$class' $opt>";
            echo $input;
        }
        if ($type=="password") // if password
        {
            $input="<input type='password' name='$name' id='$id' class='$class' placeholder='$placeholder' $opt>";
            echo $input;
        }
        if ($type=="submit") // if submit
        {
            $input="<button type='submit' class='$class'>$opt</button>";
            echo $input;
        }
    }
    function validate($name,$rules) // function for validation name: name of the field, rules: validation rules
    {
        $this->validators=$this->validators."
            $name: {
            verbose: false,
                validators: {";
        if (in_array("required",$rules)) // if rules array have value required
        {
            $label=$rules["label"];
           $this->validators=$this->validators."notEmpty: {
                        message: 'The $label is required and can\'t be empty'
                    }," ;
        }
        if (array_key_exists("min",$rules) && array_key_exists("max",$rules)) // if rules array have value min and max
        {
            $label=$rules["label"];
            $min=$rules["min"];
            $max=$rules["max"];
            $this->validators=$this->validators."stringLength: {
                    min: $min,
                    max: $max,
                    message: 'The $label must be more than $min and less than $max characters long'
                }," ;
           
        }
        else if(array_key_exists("max",$rules)) // if rules array have value max
        {
            $label=$rules["label"];
            $max=$rules["max"];
            $this->validators=$this->validators."stringLength: {
                    max: $max,
                    message: 'The $label must be less than $max characters long'
                }," ;
        }
        else if(array_key_exists("min",$rules)) // if rules array have value min
        {
            $label=$rules["label"];
            $min=$rules["min"];
            $this->validators=$this->validators."stringLength: {
                    min: $min,
                    message: 'The $label must be more than $min characters long'
                }," ;
        }
        if (array_key_exists("regexp",$rules)) // if rules array have value regular expression validation
        {
            $label=$rules["label"];
            $exp=$rules["regexp"];
            switch($exp) // selecting regular expression types
            {
                case "name": // if validation for name
                    $expression='/^[a-zA-Z ]+$/';
                    $err_msg="The $label can only consist of alphabets";
                    break;
                case "address":
                    $expression='/^([A-PR-UWYZ0-9][A-HK-Y0-9][AEHMNPRTVXY0-9]?[ABEHMNPRVWXY0-9]? {1,2}[0-9][ABD-HJLN-UW-Z]{2}|GIR 0AA)$/';
                    $err_msg="Enter a valid $label";
                    break;
                case "postcode":
                    $expression='/^([A-PR-UWYZ0-9][A-HK-Y0-9][AEHMNPRTVXY0-9]?[ABEHMNPRVWXY0-9]? {1,2}[0-9][ABD-HJLN-UW-Z]{2}|GIR 0AA)$/';
                    $err_msg="Enter a valid $label";
                    break;
                case "mobile":
                    $expression='/(\s*\(?0\d{4}\)?(\s*|-)\d{3}(\s*|-)\d{3}\s*)|(\s*\(?0\d{3}\)?(\s*|-)\d{3}(\s*|-)\d{4}\s*)|(\s*(7|8)(\d{7}|\d{3}(\-|\s{1})\d{4})\s*)/';
                    $err_msg="Enter a valid $label";
                    break;

                case "phone":
                    $expression='/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$/';
                    $err_msg="Enter a valid $label";
                    break;
                case "number":
                    $expression='/^[0-9 ]+$/';
                    $err_msg="Enter a valid $label";
                    break;
 
                case "year":
                    $expression='/^[1-2]{1}[0-9]{3}$/';
                    $err_msg="Enter a valid $label";
                    break;
            }
            $this->validators=$this->validators."regexp: {
                        regexp: $expression,
                        message: '$err_msg'
                    },";
        }
        if (in_array("email",$rules)) // if rules array have value required
        {
            $this->validators=$this->validators."emailAddress: {
                        message: 'The input is not a valid email address'
                    },";
            
        }
        if (array_key_exists("identical",$rules)) // if the field identical to another
        { 
            $identical=$rules["identical"];
            $identical_field= explode(" ",$identical);// first array value is the field which identical,second is the label of thal field
            $idl=$identical_field[0];
            $label=$rules["label"];
            $msg="";
            for($i=1;$i<sizeof($identical_field);$i++) //for extracting message
            {
                $msg=$msg.' '.$identical_field[$i];
            }
            $this->validators=$this->validators."identical: {
                        field: '$idl',
                        message: 'The $msg and $label are not the same'
                    },";
        }
        if (array_key_exists("different",$rules)) // if the field must different to another
        { 
            $different=$rules["different"];
            $label=$rules["label"];
            $different_field= explode(" ",$different); //first array value is the field which different,second is the label of thal field
            $msg="";
            $dff=$different_field[0];
            for($i=1;$i<sizeof($different_field);$i++)// for extracting message
            { 
                $msg=$msg.' '.$different_field[$i];
            }
            $this->validators=$this->validators."different: {
                        field: '$dff',
                        message: 'The $label and $msg must be different'
                    },";
        }
        $this->validators=rtrim($this->validators,",");
        $this->validators=$this->validators." } },";
        //echo $this->validators;
    }
    function applyvalidations($form_id)
    { 
        $header="
            $(document).ready(function() {
            $('#$form_id').bootstrapValidator({
            fields: {";
        $footer="}
            });
            });
            ";
        $this->validators=rtrim($this->validators,",");
        echo $header;
        echo $this->validators;
        echo $footer;
        $this->validators="";//clearing for nexe form in same page
    }  
}
?>