Feature: Ad Serving with Floor Price Check

  Rules:
  - minimum floor price is USD 1

  Scenario: Bid Request Below Floor Price
    Given a bid request with price of USD 0.9
    When process the bid request
    Then no ad should be shown

  Scenario: Bid Request Above Floor Price
    Given a bid request with price of USD 1.1
    When process the bid request
    Then an ad should be shown

  Scenario: Bid Request Equal Floor Price
    Given a bid request with price of USD 1
    When process the bid request
    Then an ad should be shown