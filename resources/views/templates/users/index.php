<table class="user-table">
    <thead>
        <th class="user-table__head">#</th>
        <th class="user-table__head">First name</th>
        <th class="user-table__head">Last name</th>
        <th class="user-table__head">E-Mail</th>
        <th class="user-table__head">Admin</th>
        <th class="user-table__head">Actions</th>
    </thead>

    <?php foreach ($users as $user) : ?>
        <tr class="user-table__row">
            <td class="user-table__data"><?php echo $user->id; ?></td>
            <td class="user-table__data"><?php echo $user->first_name; ?></td>
            <td class="user-table__data"><?php echo $user->last_name; ?></td>
            <td class="user-table__data"><?php echo $user->email; ?></td>
            <td class="user-table__data">
                <?php if ($user->is_admin == 1) : ?>
                    YES
                <?php else : ?>
                    NO
                <?php endif; ?>
            </td>
            <td class="user-table__data">
                <a href="<?php echo BASE_URL . "/users/admin/$user->id/edit" ?>" class="link-reset btn btn--edit">Edit</a>
                <a href="<?php echo BASE_URL . "/users/admin/$user->id/delete" ?>" class="link-reset btn btn--delete">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>