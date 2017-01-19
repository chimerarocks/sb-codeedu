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