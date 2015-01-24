<?php
namespace TRex\Parser;

/**
 * Class Tokenizer
 * @package TRex\Parser
 * @author Raphaël Lefebvre <raphael@raphaellefebvre.be>
 */
class Tokenizer
{
    /**
     * @param string $code
     * @return array
     */
    public function getInstantiableClassNames($code)
    {
        $result = array();
        $currentTokenType = 0;
        $currentNamespace = '';
        foreach (token_get_all($code) as $token) {
            if ($token === ';' || $token === '{') {
                $currentTokenType = 0;
            } elseif (is_array($token)) {
                if ($token[0] === T_NAMESPACE) {
                    $currentTokenType = T_NAMESPACE;
                } elseif ($token[0] === T_ABSTRACT || $token[0] === T_CLASS) {
                    $currentTokenType += $token[0];
                } elseif ($currentTokenType && $token[0] === T_STRING) {
                    if ($currentTokenType === T_NAMESPACE) {
                        $currentNamespace .= $token[1] . '\\';
                    } elseif ($currentTokenType === T_CLASS) {
                        $result[] = $currentNamespace . $token[1];
                        $currentTokenType = 0;
                    }
                }
            }
        }
        return $result;
    }
}
