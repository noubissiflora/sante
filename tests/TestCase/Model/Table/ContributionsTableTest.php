<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContributionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContributionsTable Test Case
 */
class ContributionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ContributionsTable
     */
    public $Contributions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.contributions',
        'app.patients',
        'app.roles',
        'app.commands',
        'app.pharmacies',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Contributions') ? [] : ['className' => 'App\Model\Table\ContributionsTable'];
        $this->Contributions = TableRegistry::get('Contributions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Contributions);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
