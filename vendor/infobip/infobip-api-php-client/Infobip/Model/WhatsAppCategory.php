<?php
/**
 * WhatsAppCategory
 *
 * PHP version 7.2
 *
 * @category Class
 * @package  Infobip
 * @author   Infobip Support
 * @link     https://www.infobip.com
 */

/**
 * Infobip Client API Libraries OpenAPI Specification
 *
 * OpenAPI specification containing public endpoints supported in client API libraries.
 *
 * Contact: support@infobip.com
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * Do not edit the class manually.
 */

namespace Infobip\Model;

use Infobip\ObjectSerializer;

/**
 * WhatsAppCategory Class Doc Comment
 *
 * @category Class
 * @description Category of the template.
 * @package  Infobip
 * @author   Infobip Support
 * @link     https://www.infobip.com
 */
class WhatsAppCategory
{
    /**
     * Possible values of this enum
     */
    public const ACCOUNT_UPDATE = 'ACCOUNT_UPDATE';
    public const PAYMENT_UPDATE = 'PAYMENT_UPDATE';
    public const PERSONAL_FINANCE_UPDATE = 'PERSONAL_FINANCE_UPDATE';
    public const SHIPPING_UPDATE = 'SHIPPING_UPDATE';
    public const RESERVATION_UPDATE = 'RESERVATION_UPDATE';
    public const ISSUE_RESOLUTION = 'ISSUE_RESOLUTION';
    public const APPOINTMENT_UPDATE = 'APPOINTMENT_UPDATE';
    public const TRANSPORTATION_UPDATE = 'TRANSPORTATION_UPDATE';
    public const TICKET_UPDATE = 'TICKET_UPDATE';
    public const ALERT_UPDATE = 'ALERT_UPDATE';
    public const AUTO_REPLY = 'AUTO_REPLY';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::ACCOUNT_UPDATE,
            self::PAYMENT_UPDATE,
            self::PERSONAL_FINANCE_UPDATE,
            self::SHIPPING_UPDATE,
            self::RESERVATION_UPDATE,
            self::ISSUE_RESOLUTION,
            self::APPOINTMENT_UPDATE,
            self::TRANSPORTATION_UPDATE,
            self::TICKET_UPDATE,
            self::ALERT_UPDATE,
            self::AUTO_REPLY,
        ];
    }
}
