<?php
declare(strict_types=1);

namespace EMQX\API;

use DI\Container;
use DI\DependencyException as DependencyExceptionAlias;
use DI\NotFoundException;
use EMQX\API\Common\HttpClient;
use EMQX\API\Common\HttpClientInterface;
use EMQX\API\Common\Response;
use EMQX\API\Factory\ActionsFactory;
use EMQX\API\Factory\AlarmsFactory;
use EMQX\API\Factory\BannedFactory;
use EMQX\API\Factory\ClientsFactory;
use EMQX\API\Factory\DataFactory;
use EMQX\API\Factory\ListenersFactory;
use EMQX\API\Factory\MetricsFactory;
use EMQX\API\Factory\ModulesFactory;
use EMQX\API\Factory\MqttFactory;
use EMQX\API\Factory\PluginsFactory;
use EMQX\API\Factory\ResourceFactory;
use EMQX\API\Factory\RoutesFactory;
use EMQX\API\Factory\RulesFactory;
use EMQX\API\Factory\StatsFactory;
use EMQX\API\Factory\SubscriptionsFactory;
use EMQX\API\Factory\TelemetryFactory;
use GuzzleHttp\Client;
use Psr\Container\ContainerInterface;

class EMQXClient
{
    /**
     * @var ContainerInterface
     */
    private ContainerInterface $container;
    /**
     * @var HttpClientInterface
     */
    private HttpClientInterface $client;

    /**
     * Create EMQX Api Client
     * @param string $uri
     * @param string $user
     * @param string $pass
     * @param float $timeout
     * @return static
     */
    public static function create(
        string $uri,
        string $user,
        string $pass,
        float $timeout = 5.0
    ): self
    {
        $client = new Client([
            'base_uri' => $uri,
            'auth' => [$user, $pass],
            'timeout' => $timeout
        ]);
        return new self($client);
    }

    /**
     * EMQX constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->container = new Container();
        $this->client = new HttpClient($client);
        $this->container->set(HttpClientInterface::class, $this->client);
    }

    /**
     * 返回 EMQ X 支持的所有 Endpoints
     * @return Response
     */
    public function endpoints(): Response
    {
        return $this->client->request(
            'GET',
            []
        );
    }

    /**
     * 返回集群下节点的基本信息
     * @param string|null $node 节点名字，不指定时返回所有节点的信息
     * @return Response
     */
    public function brokers(?string $node = null): Response
    {
        return $this->client->request(
            'GET',
            ['brokers', $node]
        );
    }

    /**
     * 返回节点的状态
     * @param string|null $node 节点名字，不指定时返回所有节点的信息
     * @return Response
     */
    public function nodes(?string $node = null): Response
    {
        return $this->client->request(
            'GET',
            ['nodes', $node]
        );
    }

    /**
     * @return MqttFactory
     * @throws DependencyExceptionAlias
     * @throws NotFoundException
     */
    public function mqtt(): MqttFactory
    {
        return $this->container->make(MqttFactory::class);
    }

    /**
     * @return ClientsFactory
     * @throws DependencyExceptionAlias
     * @throws NotFoundException
     */
    public function clients(): ClientsFactory
    {
        return $this->container->make(ClientsFactory::class);
    }

    /**
     * @return SubscriptionsFactory
     * @throws DependencyExceptionAlias
     * @throws NotFoundException
     */
    public function subscriptions(): SubscriptionsFactory
    {
        return $this->container->make(SubscriptionsFactory::class);
    }

    /**
     * @return RoutesFactory
     * @throws DependencyExceptionAlias
     * @throws NotFoundException
     */
    public function routes(): RoutesFactory
    {
        return $this->container->make(RoutesFactory::class);
    }

    /**
     * @return PluginsFactory
     * @throws DependencyExceptionAlias
     * @throws NotFoundException
     */
    public function plugins(): PluginsFactory
    {
        return $this->container->make(PluginsFactory::class);
    }

    /**
     * @return ListenersFactory
     * @throws DependencyExceptionAlias
     * @throws NotFoundException
     */
    public function listeners(): ListenersFactory
    {
        return $this->container->make(ListenersFactory::class);
    }

    /**
     * @return ModulesFactory
     * @throws DependencyExceptionAlias
     * @throws NotFoundException
     */
    public function modules(): ModulesFactory
    {
        return $this->container->make(ModulesFactory::class);
    }

    /**
     * @return MetricsFactory
     * @throws DependencyExceptionAlias
     * @throws NotFoundException
     */
    public function metrics(): MetricsFactory
    {
        return $this->container->make(MetricsFactory::class);
    }

    /**
     * @return StatsFactory
     * @throws DependencyExceptionAlias
     * @throws NotFoundException
     */
    public function stats(): StatsFactory
    {
        return $this->container->make(StatsFactory::class);
    }

    /**
     * @return AlarmsFactory
     * @throws DependencyExceptionAlias
     * @throws NotFoundException
     */
    public function alarms(): AlarmsFactory
    {
        return $this->container->make(AlarmsFactory::class);
    }

    /**
     * @return BannedFactory
     * @throws DependencyExceptionAlias
     * @throws NotFoundException
     */
    public function banned(): BannedFactory
    {
        return $this->container->make(BannedFactory::class);
    }

    /**
     * @return DataFactory
     * @throws DependencyExceptionAlias
     * @throws NotFoundException
     */
    public function data(): DataFactory
    {
        return $this->container->make(DataFactory::class);
    }

    /**
     * @return RulesFactory
     * @throws DependencyExceptionAlias
     * @throws NotFoundException
     */
    public function rules(): RulesFactory
    {
        return $this->container->make(RulesFactory::class);
    }

    /**
     * @return ActionsFactory
     * @throws DependencyExceptionAlias
     * @throws NotFoundException
     */
    public function actions(): ActionsFactory
    {
        return $this->container->make(ActionsFactory::class);
    }

    /**
     * @return ResourceFactory
     * @throws DependencyExceptionAlias
     * @throws NotFoundException
     */
    public function resource(): ResourceFactory
    {
        return $this->container->make(ResourceFactory::class);
    }

    /**
     * @return TelemetryFactory
     * @throws DependencyExceptionAlias
     * @throws NotFoundException
     */
    public function telemetry(): TelemetryFactory
    {
        return $this->container->make(TelemetryFactory::class);
    }
}