<?php
namespace Application\Providers;
class View {
	protected $twig;
	public function __construct()
	{
		$loader = new \Twig\Loader\FilesystemLoader(base_path('resources/views'));
		$twig = new \Twig\Environment($loader);
		$twigFunctions = new \Twig\TwigFunction(\TwigFunctions::class,
			function ($method, $params = [])
			{
				return \TwigFunctions::$method($params);
			} );
		$twig->addFunction($twigFunctions);
		$this->twig = $twig;
	}
	//a esta función le pasamos el nombre de la vista y devolverá una cadena de texto
	// con el código HTML para mostrar en el navegador:
	public function render (string $view, array $data = []): string
	{
		return $this->twig->render($view, $data);
	}
}