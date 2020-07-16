<?php declare(strict_types = 1);

/**
 * TokenValidator.php
 *
 * @license        More in license.md
 * @copyright      https://www.fastybird.com
 * @author         Adam Kadlec <adam.kadlec@fastybird.com>
 * @package        FastyBird:NodeAuth!
 * @subpackage     Security
 * @since          0.1.0
 *
 * @date           31.03.20
 */

namespace FastyBird\NodeAuth\Security;

use FastyBird\NodeLibs\Helpers as NodeLibsHelpers;
use Lcobucci\JWT;
use Nette;

/**
 * JW token parser
 *
 * @package        FastyBird:NodeAuth!
 * @subpackage     Security
 *
 * @author         Adam Kadlec <adam.kadlec@fastybird.com>
 */
final class TokenValidator
{

	use Nette\SmartObject;

	/** @var string */
	private $tokenSignature;

	/** @var JWT\Signer */
	private $signer;

	/** @var NodeLibsHelpers\IDateFactory */
	private $dateTimeFactory;

	public function __construct(
		string $tokenSignature,
		JWT\Signer $signer,
		NodeLibsHelpers\IDateFactory $dateTimeFactory
	) {
		$this->tokenSignature = $tokenSignature;

		$this->signer = $signer;
		$this->dateTimeFactory = $dateTimeFactory;
	}

	/**
	 * @param string $token
	 *
	 * @return JWT\Token|null
	 */
	public function validate(
		string $token
	): ?JWT\Token {
		$jwtParser = new JWT\Parser();

		$token = $jwtParser->parse($token);

		$validationData = new JWT\ValidationData($this->dateTimeFactory->getNow()->getTimestamp());

		if (
			$token->validate($validationData)
			&& $token->verify($this->signer, $this->tokenSignature)
		) {
			return $token;
		}

		return null;
	}

}