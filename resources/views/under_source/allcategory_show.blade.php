<tr>
    <td class="align-middle text-start">
        <div class="d-flex flex-column justify-content-center px-4">
            <p class="text-sm text-secondary mb-0"><%= obj.id %></p>
        </div>
    </td>
    <td class="align-middle text-start">
        <span class="text-secondary text-sm font-weight-bold"><%= obj.category %></span>
    </td>
    <td class="align-middle text-start">
        <form class="form-horizontal row-fluid" id="delete" data-csrf-token="{{ csrf_token() }}">
            <input type="hidden" name="category_id" value="<%= obj.id %>">
            <button type="submit" class="btn bg-gradient-danger btn-sm category-status my-sm-1" id="delete-category">Delete</button>
        </form>
    </td>
</tr>