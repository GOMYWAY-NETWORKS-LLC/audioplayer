<?php

declare(strict_types=1);

namespace OCA\audioplayer\Migration;

use Closure;
use OCP\DB\ISchemaWrapper;
use OCP\Migration\IOutput;
use OCP\Migration\SimpleMigrationStep;
use OCP\IDBConnection;

/**
 * Auto-generated migration step: Please modify to your needs!
 */
class Version2102Date20200712213332 extends SimpleMigrationStep {

    /** @var IDBConnection */
    private $connection;

    public function __construct(IDBConnection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param IOutput $output
     * @param Closure $schemaClosure The `\Closure` returns a `ISchemaWrapper`
     * @param array $options
     */
    public function preSchemaChange(IOutput $output, Closure $schemaClosure, array $options) {
    }

    /**
     * @param IOutput $output
     * @param Closure $schemaClosure The `\Closure` returns a `ISchemaWrapper`
     * @param array $options
     * @return null|ISchemaWrapper
     */
    public function changeSchema(IOutput $output, Closure $schemaClosure, array $options) {
        /** @var ISchemaWrapper $schema */
        $schema = $schemaClosure();

        return $schema;
    }

    /**
     * @param IOutput $output
     * @param Closure $schemaClosure The `\Closure` returns a `ISchemaWrapper`
     * @param array $options
     */
    public function postSchemaChange(IOutput $output, Closure $schemaClosure, array $options) {
        $query = $this->connection->getQueryBuilder();
        $query->insert('audioplayer_whats_new')
            ->values([
                'version' => $query->createNamedParameter('2.10.2'),
                'data' => $query->createNamedParameter('{"changelogURL":"https:\/\/github.com\/rello\/audioplayer\/blob\/master\/CHANGELOG.md","whatsNew":{
"en":{"regular":["Hardware media buttons support","This WhatsNew popup"],"admin":["New Features apply to users"]},
"de":{"regular":["Hardware Medien Tasten Unterstützung","Dieses WhatsNew Fenster"],"admin":["Nur User Features"]}
}}'),
            ])
            ->execute();
    }
}