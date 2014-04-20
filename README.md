PHP-Validation
==============

A fully encapsulated OOP Validation Class made with PHP

How to use
----------

1. Create a validation object using the Validator class.
2. Pass the string to be validated and a string of rules to check to the validate method in the validation object
3. The method will return an array of the rules passed as indexes and the value are the results. If the string passed validation for a rule the value of the rule key will be NULL. Otherwise it will return a string description of the issue (e.g. " is more than the maximum length of 8").  


__Warning:__ Ensure rules do not have spaces between commas.

$validate->validate("abcdefg", "r,min:3,max:6,n,a") will __work__.

$validate->validate("abcdefg", "r, min:3, max:6, n, a") will __not work__ because of the spaces.

_This will be changed in the future when a trim filter is added_
