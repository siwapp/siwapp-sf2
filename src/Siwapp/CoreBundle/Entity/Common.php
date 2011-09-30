<?php

namespace Siwapp\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Siwapp\CoreBundle\Entity\Common
 *
 * TODO: Customer and Series relations. Timestampable and Taggable
 *
 * @ORM\Table(name="common", indexes={
 *    @ORM\index(name="cstnm_idx", columns={"customer_name"}),
 *    @ORM\index(name="cstid_idx", columns={"customer_identification"}),
 *    @ORM\index(name="cstml_idx", columns={"customer_email"}),
 *    @ORM\index(name="cntct_idx", columns={"contact_person"})
 * })
 * @ORM\Entity(repositoryClass="Siwapp\CoreBundle\Entity\CommonRepository")
 */
class Common
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer $series_id
     *
     * @ORM\Column(name="series_id", type="integer")
     */
    private $series_id;

    /**
     * @var integer $customer_id
     *
     * @ORM\Column(name="customer_id", type="integer")
     */
    private $customer_id;

    /**
     * @var string $customer_name
     *
     * @ORM\Column(name="customer_name", type="string", length=100)
     */
    private $customer_name;

    /**
     * @var string $customer_identification
     *
     * @ORM\Column(name="customer_identification", type="string", length=50)
     */
    private $customer_identification;

    /**
     * @var string $customer_email
     *
     * @ORM\Column(name="customer_email", type="string", length=100)
     */
    private $customer_email;

    /**
     * @var text $invoicing_address
     *
     * @ORM\Column(name="invoicing_address", type="text")
     */
    private $invoicing_address;

    /**
     * @var text $shipping_address
     *
     * @ORM\Column(name="shipping_address", type="text")
     */
    private $shipping_address;

    /**
     * @var string $contact_person
     *
     * @ORM\Column(name="contact_person", type="string", length=100)
     */
    private $contact_person;

    /**
     * @var text $terms
     *
     * @ORM\Column(name="terms", type="text")
     */
    private $terms;

    /**
     * @var text $notes
     *
     * @ORM\Column(name="notes", type="text")
     */
    private $notes;

    /**
     * @var decimal $base_amount
     *
     * @ORM\Column(name="base_amount", type="decimal")
     */
    private $base_amount;

    /**
     * @var decimal $discount_amount
     *
     * @ORM\Column(name="discount_amount", type="decimal")
     */
    private $discount_amount;

    /**
     * @var decimal $net_amount
     *
     * @ORM\Column(name="net_amount", type="decimal")
     */
    private $net_amount;

    /**
     * @var decimal $gross_amount
     *
     * @ORM\Column(name="gross_amount", type="decimal")
     */
    private $gross_amount;

    /**
     * @var decimal $paid_amount
     *
     * @ORM\Column(name="paid_amount", type="decimal")
     */
    private $paid_amount;

    /**
     * @var decimal $tax_amount
     *
     * @ORM\Column(name="tax_amount", type="decimal")
     */
    private $tax_amount;

    /**
     * @var smallint $status
     *
     * @ORM\Column(name="status", type="smallint")
     */
    private $status;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set series_id
     *
     * @param integer $seriesId
     */
    public function setSeriesId($seriesId)
    {
        $this->series_id = $seriesId;
    }

    /**
     * Get series_id
     *
     * @return integer 
     */
    public function getSeriesId()
    {
        return $this->series_id;
    }

    /**
     * Set customer_id
     *
     * @param integer $customerId
     */
    public function setCustomerId($customerId)
    {
        $this->customer_id = $customerId;
    }

    /**
     * Get customer_id
     *
     * @return integer 
     */
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * Set customer_name
     *
     * @param string $customerName
     */
    public function setCustomerName($customerName)
    {
        $this->customer_name = $customerName;
    }

    /**
     * Get customer_name
     *
     * @return string 
     */
    public function getCustomerName()
    {
        return $this->customer_name;
    }

    /**
     * Set customer_identification
     *
     * @param string $customerIdentification
     */
    public function setCustomerIdentification($customerIdentification)
    {
        $this->customer_identification = $customerIdentification;
    }

    /**
     * Get customer_identification
     *
     * @return string 
     */
    public function getCustomerIdentification()
    {
        return $this->customer_identification;
    }

    /**
     * Set customer_email
     *
     * @param string $customerEmail
     */
    public function setCustomerEmail($customerEmail)
    {
        $this->customer_email = $customerEmail;
    }

    /**
     * Get customer_email
     *
     * @return string 
     */
    public function getCustomerEmail()
    {
        return $this->customer_email;
    }

    /**
     * Set invoicing_address
     *
     * @param text $invoicingAddress
     */
    public function setInvoicingAddress($invoicingAddress)
    {
        $this->invoicing_address = $invoicingAddress;
    }

    /**
     * Get invoicing_address
     *
     * @return text 
     */
    public function getInvoicingAddress()
    {
        return $this->invoicing_address;
    }

    /**
     * Set shipping_address
     *
     * @param text $shippingAddress
     */
    public function setShippingAddress($shippingAddress)
    {
        $this->shipping_address = $shippingAddress;
    }

    /**
     * Get shipping_address
     *
     * @return text 
     */
    public function getShippingAddress()
    {
        return $this->shipping_address;
    }

    /**
     * Set contact_person
     *
     * @param string $contactPerson
     */
    public function setContactPerson($contactPerson)
    {
        $this->contact_person = $contactPerson;
    }

    /**
     * Get contact_person
     *
     * @return string 
     */
    public function getContactPerson()
    {
        return $this->contact_person;
    }

    /**
     * Set terms
     *
     * @param text $terms
     */
    public function setTerms($terms)
    {
        $this->terms = $terms;
    }

    /**
     * Get terms
     *
     * @return text 
     */
    public function getTerms()
    {
        return $this->terms;
    }

    /**
     * Set notes
     *
     * @param text $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * Get notes
     *
     * @return text 
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set base_amount
     *
     * @param decimal $baseAmount
     */
    public function setBaseAmount($baseAmount)
    {
        $this->base_amount = $baseAmount;
    }

    /**
     * Get base_amount
     *
     * @return decimal 
     */
    public function getBaseAmount()
    {
        return $this->base_amount;
    }

    /**
     * Set discount_amount
     *
     * @param decimal $discountAmount
     */
    public function setDiscountAmount($discountAmount)
    {
        $this->discount_amount = $discountAmount;
    }

    /**
     * Get discount_amount
     *
     * @return decimal 
     */
    public function getDiscountAmount()
    {
        return $this->discount_amount;
    }

    /**
     * Set net_amount
     *
     * @param decimal $netAmount
     */
    public function setNetAmount($netAmount)
    {
        $this->net_amount = $netAmount;
    }

    /**
     * Get net_amount
     *
     * @return decimal 
     */
    public function getNetAmount()
    {
        return $this->net_amount;
    }

    /**
     * Set gross_amount
     *
     * @param decimal $grossAmount
     */
    public function setGrossAmount($grossAmount)
    {
        $this->gross_amount = $grossAmount;
    }

    /**
     * Get gross_amount
     *
     * @return decimal 
     */
    public function getGrossAmount()
    {
        return $this->gross_amount;
    }

    /**
     * Set paid_amount
     *
     * @param decimal $paidAmount
     */
    public function setPaidAmount($paidAmount)
    {
        $this->paid_amount = $paidAmount;
    }

    /**
     * Get paid_amount
     *
     * @return decimal 
     */
    public function getPaidAmount()
    {
        return $this->paid_amount;
    }

    /**
     * Set tax_amount
     *
     * @param decimal $taxAmount
     */
    public function setTaxAmount($taxAmount)
    {
        $this->tax_amount = $taxAmount;
    }

    /**
     * Get tax_amount
     *
     * @return decimal 
     */
    public function getTaxAmount()
    {
        return $this->tax_amount;
    }

    /**
     * Set status
     *
     * @param integer $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }
}