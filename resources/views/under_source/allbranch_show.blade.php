<tr>
    <td class="align-middle text-start">
        <div class="d-flex flex-column justify-content-center px-4">
            <p class="text-sm text-secondary mb-0"><%= obj.id %></p>
        </div>
    </td>
    <td class="align-middle text-start">
        <span class="text-secondary text-sm font-weight-bold"><%= obj.branch %></span>
    </td>
    <td class="align-middle text-center">
        <form class="form-horizontal row-fluid" id="delete-branch-btn" data-csrf-token="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="branch_id" value="<%= obj.id %>">
            <button type="submit" class="btn bg-gradient-danger btn-sm branch-status my-sm-1" id="delete-branch">Delete</button>
        </form>
    </td>
</tr>