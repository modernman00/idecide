<?php

namespace App\classes;

    class Form_Insert extends Insert {

        function insert($array, $redirect, $table) {

            function checkInput($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                $data = strip_tags($data);
                $data = htmlentities($data);

                return $data;
            }


            $db_form_key = array_keys($array);
            $db_form_value = array_values($array);
            $count_form_input = count($db_form_key);
            $error ="";

            $br = '<br>'; // break
            // filter and validate the form
            for ($i=0; $i < $count_form_input; $i++) {
                if (empty($db_form_value[$i])) {
                    $error .= "$db_form_key[$i] is required $br";
                } else {
                        $db_form_value[$i] = checkInput($db_form_value[$i]);

                    }

                $input[]= $db_form_value[$i];
                $input2[]= "'".$db_form_value[$i]."'";
            }

            if (!$error) {

                // INSERT DATA TO THE DB
                $redirect = header($redirect);
                $DBCol = implode(', ', array_values($db_form_key));
                $placeholder = implode(', :', array_values($db_form_key));
                $arraycombine = array_combine(array_values($db_form_key), array_values($input));
                $this->insert_direct($table, $DBCol, $placeholder, $arraycombine, $redirect);

                }

        }

    }

?>