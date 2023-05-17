<?php 
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the index function.
     *
     * @return void
     */
    public function testIndex()
    {
        $user = $this->createUserWithPermissions(['role-list']);
        $this->actingAs($user);

        $response = $this->get(route('roles.index'));

        $response->assertStatus(200);
        $response->assertViewIs('roles.index');
        // Agrega más aserciones según sea necesario
    }

    /**
     * Test the create function.
     *
     * @return void
     */
    public function testCreate()
    {
        $user = $this->createUserWithPermissions(['role-create']);
        $this->actingAs($user);

        $response = $this->get(route('roles.create'));

        $response->assertStatus(200);
        $response->assertViewIs('roles.create');
        // Agrega más aserciones según sea necesario
    }

    /**
     * Test the store function.
     *
     * @return void
     */
    public function testStore()
    {
        $user = $this->createUserWithPermissions(['role-create']);
        $this->actingAs($user);

        $permission = Permission::factory()->create();

        $data = [
            'name' => 'test_role',
            'permission' => [$permission->id]
        ];

        $response = $this->post(route('roles.store'), $data);

        $response->assertRedirect(route('roles.index'));
        $this->assertDatabaseHas('roles', ['name' => 'test_role']);
        $this->assertDatabaseHas('role_has_permissions', ['role_id' => Role::where('name', 'test_role')->first()->id, 'permission_id' => $permission->id]);
        // Agrega más aserciones según sea necesario
    }

    /**
     * Test the show function.
     *
     * @return void
     */
    public function testShow()
    {
        $user = $this->createUserWithPermissions(['role-list']);
        $this->actingAs($user);

        $role = Role::factory()->create();

        $response = $this->get(route('roles.show', $role->id));

        $response->assertStatus(200);
        $response->assertViewIs('roles.show');
        // Agrega más aserciones según sea necesario
    }

    /**
     * Test the edit function.
     *
     * @return void
     */
    public function testEdit()
    {
        $user = $this->createUserWithPermissions(['role-edit']);
        $this->actingAs($user);

        $role = Role::factory()->create();

        $response = $this->get(route('roles.edit', $role->id));

        $response->assertStatus(200);
        $response->assertViewIs('roles.edit');
        // Agrega más aserciones según sea necesario
    }

    /**
     * Test the update function.
     *
     * @return void
     */
    public function testUpdate()
    {
        $user = $this->createUserWithPermissions(['role-edit']);
        $this->actingAs($user);

        $role = Role::factory()->create();
        $permission = Permission::factory()->create();

        $data = [
            'name' => 'updated_role',
            'permission' => [$permission->id]
        ];

        $response = $this->put(route('roles.update', $role->id), $data);

        $response->assertRedirect(route('roles.index'));
        $this->assertDatabaseHas('roles', ['name' => 'updated_role']);
        $this->assertDatabaseHas('role_has_permissions', ['role_id' => $role->id, 'permission_id' => $permission->id]);
        // Agrega más aserciones según sea necesario
    }

    /**
     * Test the destroy function.
     *
     * @return void
     */
    public function testDestroy()
    {
        $user = $this->createUserWithPermissions(['role-delete']);
        $this->actingAs($user);

        $role = Role::factory()->create();

        $response = $this->delete(route('roles.destroy', $role->id));

        $response->assertRedirect(route('roles.index'));
        $this->assertDatabaseMissing('roles', ['id' => $role->id]);
        // Agrega más aserciones según sea necesario
    }

    /**
     * Helper method to create a user with specific permissions.
     *
     * @param array $permissions
     * @return \App\Models\User
     */
    private function createUserWithPermissions(array $permissions)
    {
        $role = Role::factory()->create();
        $role->syncPermissions($permissions);

        $user = User::factory()->create();
        $user->assignRole($role);

        return $user;
    }
}
