<?php
# src/router/Router.php
declare(strict_types=1);
namespace app\SiteBreaking\router;

class Router
{
    private mixed $_listRoute;
          // est issus du traidement par json_deco: cela contient un mixed qui contient des classes standard
    private static ?Router $_instance = null;

    private function __construct()
    {
        $stringRoute = file_get_contents('./../config/routes.json');
        $this->_listRoute = json_decode($stringRoute);
    }

    public static function getInstance()
    {
        if (self::$_instance == null) {
            self::$_instance = new Router();
        }
        return self::$_instance;
    }

    private function _buildParamsPattern(\stdClass $route): string
    {
        // le parametre $route est issu d'une route trouvée depuis le mixed généré par json_decode. chaque sous élément est un objet de la classe stdClass
        $patternParams = "";
        if ($route->method == "GET") {
            foreach ($route->params as $params) {
                if ($params->type == "integer") {
                    $patternParams .= '/\d';
                } else {
                    $patternParams .= '/(.*?)';
                }
            }
        }
        return $patternParams;
    }

   public function findRoute(HttpRequest $httpRequest): Route
{
    $uri = parse_url($httpRequest->getUri(), PHP_URL_PATH); // Extrait uniquement le chemin
    $method = $httpRequest->getMethod();

    // echo "Trouver la route pour URI: $uri with method: $method\n";

    $routeFound = array_filter($this->_listRoute, function($route) use ($uri, $method) {
        $pattern = "#^" . $route->path . $this->_buildParamsPattern($route) . "$#";
        // echo "vérifier pattern: $pattern\n";
        return preg_match($pattern, $uri) && $route->method == $method;
    });

    $numberRoute = count($routeFound);
    // echo "Nombre de route trouvés: $numberRoute\n";

    if ($numberRoute > 1) {
        throw new MultipleRouteFoundException();
    } else if ($numberRoute == 0) {
        throw new NoRouteFoundException();
    } else {
        return new Route(array_shift($routeFound));
    }
}

}
/**
 * La ligne de code parse_url($httpRequest->getUri(), PHP_URL_PATH) est utilisée pour isoler le chemin de l'URI de la requête, ce qui permet ensuite de le comparer facilement avec les chemins définis dans vos routes, assurant ainsi une correspondance correcte.
 * 
 */