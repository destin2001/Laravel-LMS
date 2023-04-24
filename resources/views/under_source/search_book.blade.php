<tr>
    <td class="align-middle text-center">
        <div class="d-flex flex-column justify-content-center">
            <p class="text-xs text-secondary mb-0"><%= obj.book_id %></p>
        </div>
    </td>
    <td class="align-middle text-center">
        <span class="text-secondary text-xs font-weight-bold"><%= obj.title %></span>
    </td>
    <td class="align-middle text-center">
        <span class="text-secondary text-xs font-weight-bold"><%= obj.author %></span>
    </td>
    <td class="align-middle text-start">
        <span class="text-secondary text-xs font-weight-bold"><%= obj.description %></span>
    </td>
    <td class="align-middle text-center">
        <span class="text-secondary text-xs font-weight-bold"><%= obj.publisher %></span>
    </td>
    <td class="align-middle text-center text-sm">
        <span class="text-secondary text-xs font-weight-bold"><%= obj.publish_year %></span>
    </td>
    <td class="align-middle text-center text-sm">
        <span class="text-secondary text-xs font-weight-bold"><%= obj.category %></span>
    </td>
    <td class="align-middle text-center text-sm">
        <button type="button" class="btn btn-outline-<%=type %> my-2" disabled><%= obj.avaliability %></button>
    </td>
</tr>