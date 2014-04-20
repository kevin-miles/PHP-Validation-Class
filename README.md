PHP-Validation
==============

A fully encapsulated OOP Validation Class made with PHP

How to use
----------

1. Create a validation object using the Validator class.
2. Pass the string to be validated and a string of rules to check to the validate method in the validation object
3. The method will return an array of the rules passed as indexes and the value are the results. If the string passed validation for a rule the value of the rule key will be NULL. Otherwise it will return a string description of the issue (e.g. " is more than the maximum length of 8").  

__Note:__ Spaces can be used inbetween rules. Rules are automatically trimmed. 
