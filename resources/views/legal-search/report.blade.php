@extends('layouts.app')

@section('title', 'Search Report')

@section('content')
<style type="text/css">
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #333;
      display: flex;
      justify-content: center;
    }
    
    .report-container {
      width: 1000px;
      background-color: white;
      padding: 20px;
      position: relative;
    }
    
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    .logo {
      width: 80px;
      height: 80px;
    }
    
    .header-text {
      text-align: center;
      flex-grow: 1;
      margin: 0 20px;
    }
    
    .header-title {
      color: #0066cc;
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 5px;
    }
    
    .header-subtitle {
      font-size: 14px;
      font-weight: bold;
      margin: 5px 0;
    }
    
    .header-purpose {
      font-size: 14px;
      font-weight: bold;
    }
    
    .date-section {
      text-align: right;
      margin: 10px 0 20px 0;
      font-size: 12px;
    }
    
    .section-title {
      border: 1px solid black;
      padding: 2px 5px;
      font-size: 12px;
      font-weight: bold;
      background-color: #f5f5f5;
      display: inline-block;
      margin-bottom: 5px;
    }
    
    .property-details {
      border-top: 1px solid black;
      margin-top: 0;
      padding-top: 10px;
    }
    
    .property-row {
      display: flex;
      margin-bottom: 5px;
      font-size: 12px;
    }
    
    .property-label {
      width: 150px;
      font-weight: bold;
    }
    
    .transaction-history {
      margin-top: 20px;
      border-top: 1px solid black;
      padding-top: 10px;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 11px;
    }
    
    th, td {
      padding: 3px;
      text-align: left;
      vertical-align: top;
    }
    
    th {
      background-color: white;
      font-weight: bold;
    }
    
    .watermark {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%) rotate(-45deg);
      font-size: 80px;
      color: #cccccc;
      opacity: 0.2;
      z-index: 0;
      white-space: nowrap;
      pointer-events: none;
    }
    
    .col-sn { width: 20px; }
    .col-grantor { width: 150px; }
    .col-grantee { width: 150px; }
    .col-instrument { width: 125px; }
    .col-date { width: 70px; }
    .col-reg { width: 60px; }
    .col-size { width: 60px; }
    .col-caveat { width: 60px; }
    .col-comments { width: 180px; }

    .footer {
            font-family: Arial, sans-serif;
            margin-top: 30px;
            padding: 10px 0;
            border-top: 1px solid #eee;
            width: 100%;
        }
        
        .timestamp {
            font-size: 12px;
            font-weight: bold;
            text-align: left;
            margin-bottom: 20px;
        }
        
        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }
        
        .signature-block {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        
        .signature-text {
            font-size: 12px;
            margin-bottom: 5px;
        }
        
        .signature-image {
            border: 2px solid #0047AB;
            padding: 5px;
            transform: rotate(-20deg);
            width: 200px;
            height: 45px;
        }
        
        .print-info {
            font-size: 12px;
            text-align: right;
        }
        
        .barcode {
            text-align: center;
            margin: 15px 0;
        }
        
        .disclaimer {
            font-size: 11px;
            text-align: center;
            margin-bottom: 10px;
        }
        
        .contact-info {
            font-size: 11px;
            text-align: center;
            margin-bottom: 10px;
        }
        
        .geo-info {
            font-size: 11px;
            text-align: center;
        }
  </style>
<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Search Report</h2>

                <div id="report-content" class="report-container">
                    <div class="header">
                        <img src="https://i.ibb.co/prw0q9jx/Whats-App-Image-2025-02-28-at-4-01-36-PM.jpg" alt="Kano State Logo" width="80" height="80">
                        <div class="header-text">
                            <div class="header-title">KANO STATE GEOGRAPHIC INFORMATION SYSTEM</div>
                            <div class="header-subtitle">MINISTRY OF LAND AND PHYSICAL PLANNING</div>
                            <div class="header-purpose">LEGAL SEARCH REPORT</div>
                        </div>
                        <img src="https://i.ibb.co/60m0yNx7/Whats-App-Image-2025-02-28-at-4-01-36-PM-1.jpg" alt="GIS Logo" width="80" height="80">
                    </div>

                    <div class="date-section">
                        Date: {{ now()->format('M d, Y') }}
                    </div>

                    <div class="section-title">Property Details</div>

                    <div class="property-details">
                        <div class="property-row">
                            <div class="property-label">File Number:</div>
                            <div>NewKANGISFileNo: {{ $result->file_number }}  |  kangisFileNo: {{ $result->kangis_file_number }}  |  mlsfNo: {{ $result->mlsf_no }}</div>
                        </div>

                        <div class="property-row">
                            <div class="property-label">Schedule:</div>
                            <div>{{ $result->schedule }}</div>
                        </div>

                        <div class="property-row">
                            <div class="property-label">Plot Number:</div>
                            <div>{{ $result->plot_number }}</div>
                        </div>

                        <div class="property-row">
                            <div class="property-label">Plan Number:</div>
                            <div>{{ $result->plan_number }}</div>
                        </div>

                        <div class="property-row">
                            <div class="property-label">Plot Description:</div>
                            <div>{{ $result->plot_description }}</div>
                        </div>
                    </div>

                    <br><br><br>

                    <div class="section-title">Transaction History</div>

                    <div class="transaction-history">
                        <table>
                            <thead>
                                <tr>
                                    <th class="col-sn">S/N</th>
                                    <th class="col-grantor">Assignor</th>
                                    <th class="col-grantee">Assignee</th>
                                    <th class="col-instrument">Instrument Type</th>
                                    <th class="col-date">Date</th>
                                    <th class="col-reg">Reg. No.</th>
                                    <th class="col-size">Size</th>
                                    <th class="col-comments">Comments</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $transaction->assignor }}</td>
                                        <td>{{ $transaction->assignee }}</td>
                                        <td>{{ $transaction->instrument_type }}</td>
                                        <td>{{ $transaction->transaction_date }}</td>
                                        <td>{{ $transaction->registration_number }}</td>
                                        <td>{{ $transaction->size }}</td>
                                        <td>{{ $transaction->comments }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="footer">
                        <div class="timestamp">
                            These details are as at 
                            <script>
                                document.write(new Date().toLocaleDateString() + ' ' + new Date().toLocaleTimeString());
                            </script>
                        </div>

                        <div class="footer-content">
                            <div class="signature-block">
                                <div class="signature-text">Yours Faithfully,</div>
                                <div class="signature-image">
                                    <svg width="200" height="45" viewBox="0 0 200 45" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10,35 C30,5 50,40 70,15 C90,30 110,10 130,25 C150,15 170,30 190,20" 
                                              stroke="#000080" fill="none" stroke-width="2"/>
                                        <text x="25" y="35" font-family="cursive" font-size="12" fill="#000080"></text>
                                    </svg>
                                </div>
                                .......Director Deeds.........
                            </div>
                            <div class="print-info">
                                Printed by: Peter Parke 
                            </div>
                        </div>

                        <div class="barcode">
                            <center>
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJ8AAACgCAMAAAAl6U6qAAAAaVBMVEX///8AAADc3Nw2NjbMzMwXFxf8/Pz4+PhQUFAnJydzc3M8PDy4uLhubm6ioqKWlpbo6Ojv7+9BQUGOjo4cHBzU1NSqqqrCwsJpaWkiIiIREREvLy8ICAiwsLCcnJyIiIhfX1+AgIBJSUnXY3JIAAAECklEQVR4nO2cW5uiMAyGER1kUEdAlIN44v//yL2QpLuNpbQgdNZ8l7YNL6lPD2mo57FYLNaHK/AtdEyInRjKgiGGfWLYD5fmKnPymtH5WZTBE+L72dzw94nwbRYW2hK+HRQhX2hj+If5mI/5Jufz3s5XhXqdCd8xf2qFNISvbvSGl3q+dB3otD4QvmJRPbVQ8pWJpzPsnXrwBXIRUUD5sFvVfBmdDImYj/mY7zP4kq2so56vbu7PkbZR86kNG/HlxCU7PV/py4Yp34oYvo/DF+n5sqNs+AVfJhsu3OIrmY/5mI/5mI/5mI/5JuLrWP8V7Q/1dOu/eC/pANHcF3xbqPSIntqtlXzxVbaMZt62/0Cp40Oz7o+wiPmY79P5vFn51nrZ8cWBzm7Qgy+L9Ept+Kqd3nCo5zPSrztfYD7mY745+NLqy1iCD4beZFe3RYLPxjDhWx9XFsIp6waHfxcoCgYZjmW+gYL9R0X2R25IvX9zQ8w3TMw3TB/P5zfl92uVj7WyVZS1lSrCl6rsUWUQePIuVWvOJH8tUvMVcl3Bt3xlSiGT+BXzMR/zmfB1jC8z8FXNUyEC7/xYoSSCyhDyznIoA746DRudHgZ8G3j2BeqWSrvpBSoXhAZG7HNO34u8pwFfR/yeqiP/BXQmEf0OzcFnMiOz/yif6/5znW/k/t046r92fVqGyKdfWFbIhwtVsrpN0X+Jcthbww8/X6r16fvlE9feARDddpseS/DRY1/gw6nq1uNwg/mYj/lc4Lsb8A2M7/rKKkfYHSAffGHS3KAI+XbK+O7A+Hi0UFSplr7Ml8JBJjoL+WplfHzg+UKP+VfwkYPgC2k1IR/1n1t8rvvPdT7u3x58JNAh+NB/X0q+E2k1dn7ElSQ/AA3yJZDaFp1a5TAAruTWBfnweWB+CUkdCSD+IvYfUJKX7ad8OP/SxBMyz42UnyO0lP2Hwu8/ih4ZOzZ8Xfl/lI/s3zC/0w0+6j+3+Fz3n+t8jvbvd1ulpP6D0OpdHdjuwWeXX4wLXxiNb/BLAmnFBxiFH/ITxKPIS42Un71QR4MwvrEBt3VEoK42fFb57eIJZH2wrcgjQNPl33fw5Y7zsf/Yf2/jIyu6Lr5a0gR8+9u/OkRAQ/s3vUrar97OdybNQdR/eL4KonPs6Hzq898efFRz8G0d52P//d/+G5uvx/0Mgo9Em1FL7F/45W7DZ3W/heDLSXMQph7HuWTYyyE0TTYOI90PMjD/7+33lzAf8zHfrHxW95v9xadtLhxgc7+Z3f1w4v4hbeMmwg+9be6HM1KP8wWqDZnfqObkG7a/nJDPan/JfL+Gz/X/37Y24Bt2P/Cj/yXAZ0zbyA3uBx54v3KsryyEK3SD+5VZLBbrw/QHyonYDao6l2sAAAAASUVORK5CYII=" alt="QR Code" width="100" height="100">
                        </center>
                        </div>

                        <div class="disclaimer">
                            Disclaimer: This Search Report does not represent consent to any transaction and is without prejudice to subsequent disclosures.
                        </div>

                        <div class="contact-info">
                            For enquiries, please call +234 (0) 8023456789
                        </div>

                        <div class="geo-info">
                            KANO STATE GEOGRAPHIC INFORMATION SYSTEM, Plot P/123, Secretariat Kano, Kona State
                        </div>
                    </div>
                </div>

                <div class="text-center mt-6">
                    <button id="download-pdf" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">
                        Download PDF Report
                    </button>
                    <button onclick="printReport()" class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded">Print Report</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
    document.getElementById('download-pdf').addEventListener('click', function () {
        var element = document.getElementById('report-content');
        var opt = {
            margin:       0.5,
            filename:     'Search_Report.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
        };
        html2pdf().from(element).set(opt).save();
    });

    function printReport() {
        window.print();
    }
</script>
@endsection