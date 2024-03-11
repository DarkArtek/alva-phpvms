<tr>
  <td>
    <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
      <tr>
        <td class="content-cell" align="center">
          {{ Illuminate\Mail\Markdown::parse($slot) }} @if(isset($opt_in)) You're receiving this email because you opted-into
          News emails. To change these settings, <a href="https://flyspark.org/profile">edit your profile settings</a>. @endif
        </td>
      </tr>
    </table>
  </td>
</tr>
