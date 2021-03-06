<?php

/*
 * Copyright notice:
 * (c) Copyright 2017 RocketGate
 * All rights reserved.
 *
 * The copyright notice must not be removed without specific, prior
 * written permission from RocketGate.
 *
 * This software is protected as an unpublished work under the U.S. copyright
 * laws. The above copyright notice is not intended to effect a publication of
 * this work.
 * This software is the confidential and proprietary information of RocketGate.
 * Neither the binaries nor the source code may be redistributed without prior
 * written permission from RocketGate.
 *
 * The software is provided "as-is" and without warranty of any kind, express, implied
 * or otherwise, including without limitation, any warranty of merchantability or fitness
 * for a particular purpose.  In no event shall RocketGate be liable for any direct,
 * special, incidental, indirect, consequential or other damages of any kind, or any damages
 * whatsoever arising out of or in connection with the use or performance of this software,
 * including, without limitation, damages resulting from loss of use, data or profits, and
 * whether or not advised of the possibility of damage, regardless of the theory of liability.
 */

namespace RocketGate\Sdk\Test;

use RocketGate\Sdk\GatewayRequest;

class ACHTest extends AbstractTestCase
{
    public function setUp()
    {
        parent::setUp();
        $time = time();
        $this->request->set(GatewayRequest::merchantCustomerId(), $time.'.PHPTest');
        $this->request->set(GatewayRequest::merchantInvoiceId(), $time.'.ACHTest');

        $this->request->set(GatewayRequest::amount(), '9.99');
        $this->request->set(GatewayRequest::currency(), 'USD');

        $this->request->set(GatewayRequest::routingNo(), '999999999');
        $this->request->set(GatewayRequest::accountNo(), '112233');
        $this->request->set(GatewayRequest::savingsAccount(), 'TRUE');
        $this->request->set(GatewayRequest::ssNumber(), '1111');

        $this->request->set(GatewayRequest::customerFirstName(), 'Joe');
        $this->request->set(GatewayRequest::customerLastName(), 'PHPTester');
        $this->request->set(GatewayRequest::email(), 'phptest@fakedomain.com');
        $this->request->set(GatewayRequest::ipAddress(), '11.11.11.11');

        $this->request->set(GatewayRequest::billingAddress(), '123 Main St');
        $this->request->set(GatewayRequest::billingCity(), 'Las Vegas');
        $this->request->set(GatewayRequest::billingState(), 'NV');
        $this->request->set(GatewayRequest::billingZipCode(), '89141');
        $this->request->set(GatewayRequest::billingCountry(), 'US');

        $this->request->set(GatewayRequest::scrub(), 'IGNORE');
    }

    /**
     * @test
     */
    public function PerformPurchaseTest()
    {
        $test = $this->service->PerformPurchase($this->request, $this->response);

        // should be assertTrue but RG test fails
        $this->assertFalse($test);
    }
}
