<tr>
    <td class="align-middle text-center">
        <div class="d-flex flex-column justify-content-center">
            <p class="text-xs text-secondary mb-0"><%= obj.book_id %></p>
        </div>
    </td>
    <td class="align-middle text-center">
        <span class="text-secondary text-xs font-weight-bold"><%= obj.book_issue_id %></span>
    </td>
    <td class="align-middle text-center">
        <span class="text-secondary text-xs font-weight-bold"><%= obj.book_name %></span>
    </td>
    <td class="align-middle text-start">
        <span class="text-secondary text-xs font-weight-bold"><%= obj.student_id %></span>
    </td>
    <td class="align-middle text-center">
        <span class="text-secondary text-xs font-weight-bold"><%= obj.student_name %></span>
    </td>
    <td class="align-middle text-center text-sm">
        <span class="badge badge-sm bg-gradient-success"><%= obj.issued_at %></span>
    </td>
    <td class="align-middle text-center text-sm">
        <span class="badge badge-sm bg-gradient-primary"><%= obj.return_time %></span>
    </td>
</tr>

