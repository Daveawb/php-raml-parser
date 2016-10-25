Feature: The parser parses a RAML file

  Scenario: Parse a simple RAML file
    Given I have a file "simple.raml"
    Then The title is "Parser Test File"
    And The description is "A test file for the PHP RAML Parser"
    And The base_uri is "http://local.dev/v1"