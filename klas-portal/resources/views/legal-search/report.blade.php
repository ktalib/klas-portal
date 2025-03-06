@extends('layouts.app')

@section('title', 'Search Report')

@section('content')
<style type="text/css">
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f9f9f9;
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
                            <div class="property-value">{{ $result->file_number }}</div>
                        </div>

                        <div class="property-row">
                            <div class="property-label">Plot Number:</div>
                            <div class="property-value">{{ $result->plot_number }}</div>
                        </div>

                        <div class="property-row">
                            <div class="property-label">Owner Name:</div>
                            <div class="property-value">{{ $result->assignee }}</div>
                        </div>

                        <div class="property-row">
                            <div class="property-label">Location:</div>
                            <div class="property-value">{{ $result->location }}</div>
                        </div>

                        <div class="property-row">
                            <div class="property-label">Certificate Number:</div>
                            <div class="property-value">{{ $result->certificate_number }}</div>
                        </div>
                    </div>

                    <br><br><br>

                    <div class="section-title">Transaction History</div>

                    <div class="transaction-history">
                        <table>
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Assignor</th>
                                    <th>Assignee</th>
                                    <th>Instrument Type</th>
                                    <th>Date</th>
                                    <th>Reg. No.</th>
                                    <th>Size</th>
                                    <th>Comments</th>
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
                            Generated on: {{ now()->format('M d, Y H:i') }}
                        </div>

                        <div class="footer-content">
                            <div class="signature-block">
                                <div class="signature-text">Authorized Signature</div>
                                <img src="signature.png" alt="Signature" class="signature-image">
                            </div>
                            <div class="print-info">This report is generated electronically and does not require a signature.</div>
                        </div>

                        <div class="barcode">
                            <img src="barcode.png" alt="Barcode">
                        </div>

                        <div class="disclaimer">
                            This report is for informational purposes only and should not be considered legal advice.
                        </div>

                        <div class="contact-info">
                            For inquiries, contact us at info@example.com
                        </div>

                        <div class="geo-info">
                            Kano State Geographic Information System
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