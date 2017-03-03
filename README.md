## Course

```bash
$ composer create-project zendframework/zend-expressive-skeleton <project-path>
```

copy local.php.dist to local.php to dev environment.

to integrate doctrine:

change packages versions

- "zendframework/zend-stdlib": "~2.7.0",
- "zendframework/zend-expressive-aurarouter": "^1.0",
- "zendframework/zend-servicemanager": "^2.7.3 || ^3.0",
- "zendframework/zend-expressive-twigrenderer": "1.1.1",
- "doctrine/doctrine-orm-module": "0.10.0"

made changes:

https://gist.github.com/argentinaluiz/a14df7b1ef73cc111b280e417f84ba92

commit: 'doctrine integration'

commit: 'change namespace application'

commit: 'db configuration'

commit: 'added domain'

commit: 'doctrine infrastructure'

commit: 'adding adminLTE'

commit: 'uml'

commit: 'yaml mapping of entities'

commit: 'repositories'

commit: 'listing clients route + repository + action + config'


## Flash Message 

Usar Aurea.Session, como ponte deve se usar 
damess/expressive-session-middleware

copiar o arquivo session.global.php da pasta damess/config no vendor para o autoload

inserir AueraSession no container

O flash message foi usado como atributo da request, sendo injetado no bootstrap middleware

## Zend Form 

É necessário fazer algumas atualizações:

"zendframework/zend-servicemanager": "^3.0",
"zendframework/zend-form": "2.9.0",
"zendframework/zend-i18n": "2.7.3",
"zendframework/zend-view": "2.8.1"

Para o helper do form funcione com o twig é necessário obter o twig environment

Pra isso é necessário copiar as classes TwigRenderer e TwigRendererFactory
TwigRenderer se refere ao TemplateInterface utilizado pela aplicação

Lebrando de fazer as importações da Factory

Em templates.global chamar a Factory Criada
E criar um alias pra Config e Configuration

Integrar configurações do form.global com as configurações do Zend\Form
HelperPluginManager é como um serviceContainers para os helpers da view

Por fim é necessário integrar view_helpers com o twig em um Middleware

Após criar o form é necessário criar um Hydrator pra facilitar a manipulação.

## Data fixtures com Doctrine

zendexpr-doctrine-fixture para facilitar por linha de comando
faker para criar os dados

Para criar o comando de fixtures importar a factory no dependencies

```php
[
    ...
    'doctrine:fixtures_cmd:load' =>
                CodeEdu\FixtureFactory::class
    ...
]
```

E no doctrine-config.global.php

```php
[
    ...
    'doctrine:fixtures_cmd:load',
    ...
]
```

E no doctrine.local.php, como as configurações são locais.

```php
[
    ...
    'fixtures' => [
        'MyFixture' => __DIR__ . '/../../src/CodeEmailMkt/Infrastructure/Persistence/Doctrine/DataFixture'
    ]
    ...
]
```

##Autenticação

Para trabalhar com autenticação é necessário instalar a Zend-session, ou outra biblioteca de controle de sessão para o php.

composer require zendframework/zend-session, nesse caso foi instalada a versão ':2.7.3'

Em doctrine.global.php inserir as configurações de autenticação:

```php
[
    ...
    'authentication' => [
            'orm_default' => [
            'object_manager' => \Doctrine\ORM\EntityManager::class,
                'identity_class' => \CodeEmailMkt\Domain\Entity\User::class,
                'identity_property' => 'email',
                'credential_property' => 'password',
            ]
    ],
    ...
]
```
 
Criar um alias para facilitar a utilização do serviço

```php
[
    ...
    'aliases' => [
            ...
            AuthenticationService::class 
                => 'doctrine.authenticationservice.orm_default'
            ...
    ],
    ...
]
```

Criar o AuthService

Para gerar a senha criptografada foi criado um método na entidade User chamado generatePassword

```php
    /**
     * Verifica se foi atribuída alguma senha,
     * se sim gera uma criptografia a partir dela,
     * se não gera uma criptografia aleatória
     */
    public function generatePassword()
    {
        $password = $this->getPlainPassword() ? $this->getPlainPassword() : uniqid();
        $this->setPassword(password_hash($password, PASSWORD_BCRYPT));
    }
```

e adicionado esse metodo no lifeCycle do Doctrine no arquivo yml de User

```yaml
lifecycleCallbacks:
    prePersist: [generatePassword]
```

e por último em doctrine.global foi adicionado um callback de verificação de senha

```php
'authentication' => [
    'orm_default' => [
        'object_manager' => \Doctrine\ORM\EntityManager::class,
        'identity_class' => User::class,
        'identity_property' => 'email',
        'credential_property' => 'password',
        'credential_callable' => function(User $user, $passwordGiven) {
            return password_verify($passwordGiven, $user->getPassword());
        }
    ]
]
```

##Flash Message

Por fim foi retirado as flash o pacote de Aura Session para flash messages e usado as flash messages do zendo mesmo.

##Obter usuário no front

Utilizando o helper identity
em form.global

```php
[
    'view_helpers' => [
        'aliases' => [
        ],
        'invokables' => [
        ],
        'factories' => [
            'identity' => Identity::class
        ]
    ]
]
```

##Tags 

Atenção as fixtures e Form Factory

Toda vez que trabalhar com o Hydrator do Doctrine a entidade deve ter get add remove para relacionamentos