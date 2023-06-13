<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\PostResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Joselfonseca\LaravelTactician\CommandBusInterface;
use Shiring\Application\Post\Command\CreatePostCommand;
use Shiring\Application\Post\Command\CreatePostHandler;
use Shiring\Application\Post\Command\DeletePostCommand;
use Shiring\Application\Post\Command\DeletePostHandler;
use Shiring\Application\Post\Command\UpdatePostCommand;
use Shiring\Application\Post\Command\UpdatePostHandler;
use Shiring\Application\Post\Service\PostService;
use Shiring\Domain\Post\Entity\Post;

class PostController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param PostService $service
     * @param CommandBusInterface $commandBus
     */
    public function __construct(
        private readonly PostService $service,
        private readonly CommandBusInterface $commandBus,
    )
    {
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        /**
         * @var Post[] $posts
         */
        $posts = $this->service->getList();

        return response()->json([
            'message' => 'Thanh cong',
            'data' => PostResource::collection($posts),
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $this->commandBus->addHandler(CreatePostCommand::class, CreatePostHandler::class);
        $data = $this->commandBus->dispatch(new CreatePostCommand(
            $request->post('title'),
            $request->post('content'),
            $request->post('status')
        ));

        return response()->json([
            'message' => 'Thanh cong',
            'data' => PostResource::make($data),
        ]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $this->commandBus->addHandler(UpdatePostCommand::class, UpdatePostHandler::class);
        $this->commandBus->dispatch(new UpdatePostCommand(
            $id,
            $request->post('title'),
            $request->post('content'),
            $request->post('status')
        ));

        return response()->json([
            'message' => 'Thanh cong'
        ]);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $data = $this->service->show($id);

        return response()->json([
            'message' => 'Thanh cong',
            'data' => PostResource::make($data),
        ]);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->commandBus->addHandler(DeletePostCommand::class, DeletePostHandler::class);
        $this->commandBus->dispatch(new DeletePostCommand(
            $id,
        ));

        return response()->json([
            'message' => 'Thanh cong'
        ]);
    }
}
