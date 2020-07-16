<?php declare(strict_types = 1);

/**
 * IIdentityFactory.php
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

use Lcobucci\JWT;
use Nette\Security as NS;

/**
 * Application identity factory interface
 *
 * @package        FastyBird:NodeAuth!
 * @subpackage     Security
 *
 * @author         Adam Kadlec <adam.kadlec@fastybird.com>
 */
interface IIdentityFactory
{

	/**
	 * @param JWT\Token $token
	 *
	 * @return NS\IIdentity|null
	 */
	public function create(JWT\Token $token): ?NS\IIdentity;

}