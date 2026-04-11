<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\AI\Platform\Contract\JsonSchema;

/**
 * Allows an object to provide its own JSON schema at runtime, bypassing reflection-based generation.
 *
 * Implement this interface when schema values cannot be expressed as PHP constant expressions,
 * for example enum values loaded from a database, environment variables, or a translated configuration.
 *
 * Supported contexts:
 *  - Structured output: pass the implementing object as the `response_format` option of {@see \Symfony\AI\Platform\PlatformInterface::invoke()}
 *  - Tool calling: implement on a class annotated with {@see \Symfony\AI\Agent\Toolbox\Attribute\AsTool} to override reflection-based parameter schema generation
 *
 * @author Camille Islasse <camille@guiziweb.fr>
 */
interface JsonSchemaProviderInterface
{
    /**
     * Returns the JSON schema describing this object's structure.
     *
     * @return array<string, mixed>
     */
    public function buildJsonSchema(): array;
}