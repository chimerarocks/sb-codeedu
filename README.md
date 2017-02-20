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