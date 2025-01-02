<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\TextUI\Command;

use const PHP_EOL;
<<<<<<< HEAD
use function file_get_contents;
use function sprintf;
use function version_compare;
use PHPUnit\Runner\Version;
=======
use function assert;
use function sprintf;
use function version_compare;
use PHPUnit\Util\Http\Downloader;
>>>>>>> tundeseun/devtest

/**
 * @no-named-arguments Parameter names are not covered by the backward compatibility promise for PHPUnit
 *
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
<<<<<<< HEAD
 *
 * @codeCoverageIgnore
 */
final class VersionCheckCommand implements Command
{
    public function execute(): Result
    {
        $latestVersion           = file_get_contents('https://phar.phpunit.de/latest-version-of/phpunit');
        $latestCompatibleVersion = file_get_contents('https://phar.phpunit.de/latest-version-of/phpunit-' . Version::majorVersionNumber());

        $notLatest           = version_compare($latestVersion, Version::id(), '>');
        $notLatestCompatible = version_compare($latestCompatibleVersion, Version::id(), '>');
=======
 */
final class VersionCheckCommand implements Command
{
    private readonly Downloader $downloader;
    private readonly int $majorVersionNumber;
    private readonly string $versionId;

    public function __construct(Downloader $downloader, int $majorVersionNumber, string $versionId)
    {
        $this->downloader         = $downloader;
        $this->majorVersionNumber = $majorVersionNumber;
        $this->versionId          = $versionId;
    }

    public function execute(): Result
    {
        $latestVersion = $this->downloader->download('https://phar.phpunit.de/latest-version-of/phpunit');

        assert($latestVersion !== false);

        $latestCompatibleVersion = $this->downloader->download('https://phar.phpunit.de/latest-version-of/phpunit-' . $this->majorVersionNumber);

        assert($latestCompatibleVersion !== false);

        $notLatest           = version_compare($latestVersion, $this->versionId, '>');
        $notLatestCompatible = version_compare($latestCompatibleVersion, $this->versionId, '>');
>>>>>>> tundeseun/devtest

        if (!$notLatest && !$notLatestCompatible) {
            return Result::from(
                'You are using the latest version of PHPUnit.' . PHP_EOL,
            );
        }

        $buffer = 'You are not using the latest version of PHPUnit.' . PHP_EOL;

        if ($notLatestCompatible) {
            $buffer .= sprintf(
                'The latest version compatible with PHPUnit %s is PHPUnit %s.' . PHP_EOL,
<<<<<<< HEAD
                Version::id(),
=======
                $this->versionId,
>>>>>>> tundeseun/devtest
                $latestCompatibleVersion,
            );
        }

        if ($notLatest) {
            $buffer .= sprintf(
                'The latest version is PHPUnit %s.' . PHP_EOL,
                $latestVersion,
            );
        }

        return Result::from($buffer);
    }
}
