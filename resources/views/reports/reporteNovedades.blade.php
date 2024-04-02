  {{-- ENCABEZADO --}}
  <div style="text-align: center">
      <img src="vendor/adminlte/dist/img/ESPE_SantoDomingo.png" alt="logoEspe" width="300px">
      <h2 style="padding: 0;  margin:3px; margin-top:8px">BITÁCORA NOVEDADES</h2>
      <div style="font-size: 11px;">
          <div>
              Fecha de Inicio del Reporte:
              {{ Carbon\Carbon::parse($fechaInicio)->format('d-M-Y H:i') }}
          </div>
          <div>
              Fecha de Fin del Reporte:
              {{ Carbon\Carbon::parse($fechaFin)->format('d-M-Y H:i') }}
          </div>
      </div>
  </div>
  {{-- CUERPO --}}
  <div style="display: flex; flex-direction: column; width: 100%;">
      {{-- TÍTULO SEGUNDA TABLA --}}

      <table style="border-collapse: collapse; width: 100%; text-align: center;">
          <thead style=";">
              <tr style="border: 1px solid black; color: rgb(40, 38, 38);">
                  <th style="padding: 5px;">Ord</th>
                  <th style="padding: 5px;">Novedades</th>
                  <th style="padding: 5px;">Fecha-Hora</th>
                  <th style="padding: 5px;">Guardia Turno</th>

              </tr>
          </thead>
          <tbody style="font-size: 14px;">
              @php
                  $ord = 1;
              @endphp
              @foreach ($novelties as $item)
                  <tr style="border: 1px solid black;">
                      <td style="padding: 5px;">{{ $ord++ }}</td>
                      <td style="padding: 5px; text-align: left">{{ $item->novelty }}</td>
                      <td style="padding: 5px;">{{ $item->hour }}</td>
                      <td style="padding: 5px;">{{ $item->Guard }}</td>
                  </tr>
              @endforeach
          </tbody>
      </table>

      {{-- FECHA --}}
      <section style="display: flex; justify-content: left; flex-direction: row">
          <div>Fecha que se generó reporte:
              @php
                  date_default_timezone_set('America/Guayaquil');
              @endphp

              {{ $fecha_actual = date('Y-M-d') }}
          </div>
      </section>

      <table style=" width: 100%; text-align: center;">
        <tr style="padding-top: 40px">
            <td style="padding-top: 45px;">____________________________________</td>
            <td style="padding-top: 45px;">___________________</td>
            <td style="padding-top: 45px;">__________________</td>
        </tr>
        <tr style=" padding-top: 40px">
            <td style="padding: 5px;">OFICIAL DE GUARDIA/JEFE CUARTEL</td>
            <td style="padding: 5px;">CLASE DE SERVICIO</td>
            <td style="padding: 5px;">OFICIAL ADMINISTRATIVO</td>
        </tr>

    </table>
  </div>
