<?php declare(strict_types = 1);

/**
 * PlainIdentity.php
 *
 * @license        More in license.md
 * @copyright      https://fastybird.com
 * @author         Adam Kadlec <adam.kadlec@fastybird.com>
 * @package        FastyBird:NodeAuth!
 * @subpackage     Security
 * @since          0.1.0
 *
 * @date           15.07.20
 */

namespace FastyBird\NodeAuth\Security;

use FastyBird\NodeAuth\Exceptions;
use FastyBird\NodeAuth\Security;
use Nette;
use Ramsey\Uuid;

/**
 * System basic plain identity
 *
 * @package        FastyBird:NodeAuth!
 * @subpackage     Security
 *
 * @author         Adam Kadlec <adam.kadlec@fastybird.com>
 */
class PlainIdentity implements Security\IIdentity
{

	use Nette\SmartObject;

	/** @var Uuid\UuidInterface */
	private $id;

	/** @var string[] */
	private $roles;

	/**
	 * @param string $id
	 * @param string[] $roles
	 */
	public function __construct(string $id, array $roles = [])
	{
		if (!Uuid\Uuid::isValid($id)) {
			throw new Exceptions\InvalidArgumentException('User identifier have to be valid UUID string');
		}

		$this->id = Uuid\Uuid::fromString($id);
		$this->roles = $roles;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getId(): Uuid\UuidInterface
	{
		return $this->id;
	}

	/**
	 * @return string[]
	 */
	public function getRoles(): array
	{
		return $this->roles;
	}

}
