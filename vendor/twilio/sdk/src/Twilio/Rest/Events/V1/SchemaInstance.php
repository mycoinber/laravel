<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Events\V1;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Rest\Events\V1\Schema\SchemaVersionList;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 *
 * @property string $id
 * @property string $url
 * @property array $links
 * @property \DateTime $latestVersionDateCreated
 * @property int $latestVersion
 */
class SchemaInstance extends InstanceResource {
    protected $_versions;

    /**
     * Initialize the SchemaInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $id The unique identifier of the schema.
     */
    public function __construct(Version $version, array $payload, string $id = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = [
            'id' => Values::array_get($payload, 'id'),
            'url' => Values::array_get($payload, 'url'),
            'links' => Values::array_get($payload, 'links'),
            'latestVersionDateCreated' => Deserialize::dateTime(Values::array_get($payload, 'latest_version_date_created')),
            'latestVersion' => Values::array_get($payload, 'latest_version'),
        ];

        $this->solution = ['id' => $id ?: $this->properties['id'], ];
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return SchemaContext Context for this SchemaInstance
     */
    protected function proxy(): SchemaContext {
        if (!$this->context) {
            $this->context = new SchemaContext($this->version, $this->solution['id']);
        }

        return $this->context;
    }

    /**
     * Fetch the SchemaInstance
     *
     * @return SchemaInstance Fetched SchemaInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): SchemaInstance {
        return $this->proxy()->fetch();
    }

    /**
     * Access the versions
     */
    protected function getVersions(): SchemaVersionList {
        return $this->proxy()->versions;
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name) {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Events.V1.SchemaInstance ' . \implode(' ', $context) . ']';
    }
}