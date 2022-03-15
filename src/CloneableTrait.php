<?php
/*
 * @license   https://opensource.org/licenses/MIT MIT License
 * @copyright 2022 Ronan GIRON
 * @author    Ronan GIRON <https://github.com/ElGigi>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code, to the root.
 */

declare(strict_types=1);

namespace ElGigi\Iban;

use ReflectionClass;

trait CloneableTrait
{
    public function with(...$args): static
    {
        $reflection = new ReflectionClass($this);
        /** @var static $new */
        $new = $reflection->newInstanceWithoutConstructor();

        foreach (get_object_vars($this) as $key=>$value) {
            if (array_key_exists($key, $args)) {
                $value = $args[$key];
            }

            $new->{$key} = $value;
        }

        return $new;
    }
}