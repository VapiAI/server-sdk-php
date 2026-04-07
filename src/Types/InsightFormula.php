<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class InsightFormula extends JsonSerializableType
{
    /**
     * This is the name of the formula.
     * It will be used to label the formula in the insight board on the UI.
     *
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * This is the formula to calculate the insight from the queries.
     * The formula needs to be a valid mathematical expression.
     * The formula must contain at least one query name in the LiquidJS format {{query_name}} or {{['query name']}} which will be substituted with the query result.
     * Any MathJS formula is allowed - https://mathjs.org/docs/expressions/syntax.html
     *
     * Common valid math operations are +, -, *, /, %
     *
     * @var string $formula
     */
    #[JsonProperty('formula')]
    public string $formula;

    /**
     * @param array{
     *   formula: string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'] ?? null;
        $this->formula = $values['formula'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
