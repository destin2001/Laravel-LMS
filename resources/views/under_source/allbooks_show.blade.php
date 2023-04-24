<tr>
    <td class="align-middle text-center">
        <div class="d-flex flex-column justify-content-center">
            <p class="text-xs text-secondary mb-0"><%= obj.book_id %></p>
        </div>
    </td>
    <td class="align-middle text-center">
        <span class="text-secondary text-sm font-weight-bold"><%= obj.title %></span>
    </td>
    <td class="align-middle text-center">
        <span class="text-secondary text-sm font-weight-bold"><%= obj.author %></span>
    </td>
    <td class="align-middle text-start">
        <span class="text-secondary text-sm font-weight-bold"><%= obj.description %></span>
    </td>
    <td class="align-middle text-start">
        <span class="text-secondary text-sm font-weight-bold"><%= obj.category %></span>
    </td>
    <td class="align-middle text-center text-sm">
        <button type="button" class="btn bg-gradient-success student-status" disabled><%= obj.avaliable %></button>
    </td>
    <td class="align-middle text-center text-sm">
		<button type="button" class="btn bg-gradient-secondary student-status" disabled><%= obj.total_books %></button>
    </td>
</tr>

