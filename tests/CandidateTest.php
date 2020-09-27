<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Source\Models\Candidate;

require __DIR__ . '/../source/config/Config.php';

final class CandidateTest extends TestCase
{
    public function testCanBeCreatedValidCandidate(): void
    {
        $candidate = new Candidate(
            "Damian Meneses",
            "menesesd2@live.com",
            "71997124690",
            "espero ser contratado pela netshowme",
            "storage/files",
            "10.0.0.106",
        );

       $this->assertEquals(2, $candidate->save());
    }
}
