<?php declare(strict_types = 1);

/**
 * Constants.php
 *
 * @license        More in license.md
 * @copyright      https://www.fastybird.com
 * @author         Adam Kadlec <adam.kadlec@fastybird.com>
 * @package        FastyBird:NodeAuth!
 * @subpackage     common
 * @since          0.1.0
 *
 * @date           09.07.20
 */

namespace FastyBird\NodeAuth;

/**
 * Library constants
 *
 * @package        FastyBird:NodeAuth!
 * @subpackage     common
 *
 * @author         Adam Kadlec <adam.kadlec@fastybird.com>
 */
final class Constants
{

	/**
	 * Node ACL
	 */

	// Permissions string delimiter
	public const PERMISSIONS_DELIMITER = ':';

	/**
	 * Security tokens
	 */

	public const TOKEN_URI_NAME = 'authorization';

	public const TOKEN_HEADER_NAME = 'authorization';
	public const TOKEN_HEADER_REGEXP = '/Bearer\s+(.*)$/i';

	public const TOKEN_CLAIM_USER = 'user';
	public const TOKEN_CLAIM_ROLES = 'roles';
	/**
	 * Defined roles
	 */

	public const ROLE_ANONYMOUS = 'guest';
	public const ROLE_VISITOR = 'visitor';
	public const ROLE_OPERATOR = 'operator';
	public const ROLE_MANAGER = 'manager';
	public const ROLE_ADMINISTRATOR = 'administrator';

}
