<?php

namespace RedeCard\Ecommerce\Entity\Transaction;

use RedeCard\Ecommerce\Entity\AbstractEntity;
use RedeCard\Ecommerce\Entity\Transaction\CardTransaction\Card;
use RedeCard\Ecommerce\Entity\Enum\MethodEnum;
use RedeCard\Ecommerce\Exception\InvalidMethodException;

/**
 * Class CardTransaction
 *
 * @package RedeCard\Ecommerce\Entity\Transaction
 * @author Daniel Costa <daniel.costa@mobly.com.br>
 */
class CardTransaction extends AbstractEntity {

    /**
     * @var CardTransaction\Card
     */
    protected $Card;

    /**
     * Código de autorização recebido do banco
     *
     * Se for apresentado, deve ser o código de autorização recebido do banco.
     *
     * @var string
     */
    protected $authCode;

    /**
     * Tipo de transação
     *
     * @var string auth/pre
     * @see RedeCard\Ecommerce\Entity\Enum\MethodEnum
     */
    protected $method;

    /**
     * @param Card $Card
     */
    public function setCard(Card $Card)
    {
        $this->Card = $Card;
        return $this;
    }

    /**
     * @return Card
     */
    public function getCard()
    {
        return $this->Card;
    }

    /**
     * @param string $authcode
     */
    public function setAuthCode($authCode)
    {
        $this->authCode = $authCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthCode()
    {
        return $this->authCode;
    }

    /**
     * @param string $method
     * @throws \RedeCard\Ecommerce\Exception\InvalidMethodException
     */
    public function setMethod($method)
    {
        switch ($method) {
            case MethodEnum::AUTH:
            case MethodEnum::CANCEL:
            case MethodEnum::FULFILL:
            case MethodEnum::PRE:
                $this->method = $method;
                return $this;
                break;
            default:
                throw new InvalidMethodException('Invalid card transaction Method. Only "auth", "cancel", "fulfill" or "pre" allowed.');
        }
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

}