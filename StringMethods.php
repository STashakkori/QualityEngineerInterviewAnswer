<?php
    /*
     * StringMethods : class that provides search and manipulation methods for character arrays.
     */
    class StringMethods
    {
        public $string_to_search;

        public function __construct(){
            $this->string_to_search = array('t', 'h', 'i', 's', 'i', 's', 'a', 't', 'e', 's', 't');
        }

        /*
         * indexOf: method that returns the index of the first occurence of a character in a string of characters
         *          if the input is a string of characters instead of a single character, method returns the index
         *          of the first character of the string should the entire string exist contiguously in the string
         *          searched
         */
        public function indexOf($string_to_find){
            $find_string_length = count($string_to_find);
            $search_string_length = count($this->string_to_search);
            $find_string_first_char = $string_to_find[0];
            $match_counter = 0;

            // case where the input string to find is only one character
            if($find_string_length == 1) {
                // loop through the sentence
                for ($i = 0; $i < $search_string_length; $i++) {
                    if($this->string_to_search[$i] == $find_string_first_char)
                        return $i;
                }
            }

            // case where the input string is a word or sentence and is not too big to be valid
            else if($find_string_length > 1 && $find_string_length < $search_string_length){
                // loop through the sentence
                for ($i = 0; $i < $search_string_length; $i++) {
                    // case when the first character of the string is located
                    if($this->string_to_search[$i] == $find_string_first_char){
                        // case when there is not enough room left in the search string to contain the find string.
                        if($search_string_length - $i < $find_string_length) return -1;

                        // do a look ahead until the end of the sentence
                        for($j = $i; $j < $search_string_length; $j++){
                            // case when we find a character that does not match what's in the find string.
                            if($string_to_find[$j - $i] == $this->string_to_search[$j]){
                                $match_counter++;
                                if($match_counter == $find_string_length) return $i;
                                continue;
                            }
                            else
                                $match_counter = 0;
                                break;
                        }
                    }
                }
            }
            // case where the input string is invalid
            else return -1;
        }

        /*
         * reverse: method that outputs an input string with the tokens in the string reversed and white spaces left
         *          alone.
         */
        public function reverse($string_to_reverse)
        {
            $search_string_length = count($string_to_reverse);
            $reversed_string = [];

            // case where the input string is only one character long.
            if($search_string_length == 1) return $string_to_reverse;

            // case where the input is a string possibly containing multiple word tokens.
            else if($search_string_length > 1){
                $temp_token_array = [];

                // loop through the input sentence
                for ($i = 0; $i < count($string_to_reverse); $i++) {
                    //echo $string_to_reverse[$i]."\n";
                    if($string_to_reverse[$i] != ' '){
                        $temp_token_array[$i] = $string_to_reverse[$i];
                    }

                    // put the whitespace in as is
                    else {
                        $reversed_string[$i] = $string_to_reverse[$i];
                        continue;
                    }
                    // case when you reach a whitespace -> pop the previous string token into the output but in reverse
                    if($string_to_reverse[$i] == ' ' || $i == count($string_to_reverse) - 1){
                        // loop through the temporary token holder
                        for($j = 0; $j < count($temp_token_array); $j++){
                            $reversed_string[$j] = $temp_token_array[count($temp_token_array) - $j - 1];
                        }

                        // clear out the temporary token holder
                        $temp_token_array = [];
                    }
                }
                return $reversed_string;
            }
            // case where the input string is invalid
            else return -1;
        }
    }
?>