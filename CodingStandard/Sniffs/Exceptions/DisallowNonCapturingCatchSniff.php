<?php declare(strict_types = 1);

namespace CodingStandard\Sniffs\Exceptions;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;
use CodingStandard\Helpers\TokenHelper;
use const T_CATCH;
use const T_VARIABLE;

class DisallowNonCapturingCatchSniff implements Sniff
{

    public const CODE_DISALLOWED_NON_CAPTURING_CATCH = 'DisallowedNonCapturingCatch';

    /**
     * @return array<int, (int|string)>
     */
    public function register(): array
    {
        return [
            T_CATCH,
        ];
    }

    /**
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint
     * @param File $phpcsFile
     * @param int $catchPointer
     */
    public function process(File $phpcsFile, $catchPointer): void
    {
        $tokens = $phpcsFile->getTokens();

        $variablePointer = TokenHelper::findNext(
            $phpcsFile,
            T_VARIABLE,
            $tokens[$catchPointer]['parenthesis_opener'],
            $tokens[$catchPointer]['parenthesis_closer']
        );

        if ($variablePointer === null) {
            $phpcsFile->addError('Use of non-capturing catch is disallowed.', $catchPointer, self::CODE_DISALLOWED_NON_CAPTURING_CATCH);
        }
    }

}