<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements SnippetAcceptingContext
{
    private $bidRequest;
    private $adResponse;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->adServer = new AdServer();
        $this->adServer->setFloorPrice(1);
    }

    /**
     * @Given a bid request with price of USD :price
     */
    public function aBidRequestWithPriceOfUsd($price)
    {
        $this->bidRequest = new BidRequest();
        $this->bidRequest->setPrice($price);
        $this->bidRequest->setAdTag('Ad Tag - USD ' . $price);
    }

    /**
     * @When process the bid request
     */
    public function processTheBidRequest()
    {
        $this->adResponse = $this->adServer->adSelect($this->bidRequest);
    }

    /**
     * @Then no ad should be shown
     */
    public function noAdShouldBeShown()
    {
        Assert::AssertEmpty($this->adResponse);
    }

    /**
     * @Then an ad should be shown
     */
    public function anAdShouldBeShown()
    {
        Assert::AssertNotEmpty($this->adResponse);
    }
}
